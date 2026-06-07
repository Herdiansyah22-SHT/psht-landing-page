<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Tampilkan daftar semua item profil
     */
    public function index()
    {
        $profils = Profil::all();
        return view('admin.profil.index', compact('profils'));
    }

    /**
     * Tampilkan form tambah profil baru
     */
    public function create()
    {
        return view('admin.profil.create');
    }

    /**
     * Simpan profil baru ke database
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'key'    => 'required|unique:profils,key|alpha_dash', // Key harus unik dan tanpa spasi
            'judul'  => 'required|string|max:200',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // Menyesuaikan dengan fitur di update
        ], [
            'key.unique' => 'Key ini sudah digunakan, silakan gunakan kata lain.',
            'key.alpha_dash' => 'Key hanya boleh berisi huruf, angka, strip (-), atau underscore (_).'
        ]);

        // 2. Ambil data yang diperlukan
        $data = $request->only(['key', 'judul', 'konten']);
        $data['key'] = strtolower($data['key']); // Pastikan key selalu huruf kecil

        // 3. Proses upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('profil', 'public');
        }

        // 4. Simpan ke database
        Profil::create($data);

        // 5. Kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.profil.index')
                         ->with('success', 'Konten profil baru berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit berdasarkan ID/Key
     */
    public function edit(Profil $profil)
    {
        return view('admin.profil.edit', compact('profil'));
    }

    /**
     * Simpan perubahan profil
     */
    public function update(Request $request, Profil $profil)
    {
        $request->validate([
            'judul'  => 'nullable|string|max:200',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['judul', 'konten']);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($profil->gambar) {
                Storage::disk('public')->delete($profil->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('profil', 'public');
        }

        $profil->update($data);

        return redirect()->route('admin.profil.index')
                         ->with('success', 'Profil "' . $profil->judul . '" berhasil diperbarui.');
    }
}
