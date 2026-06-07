<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->paginate(12);
        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:200',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'required|image|mimes:jpg,jpeg,png,webp|max:3072',
            'kategori'  => 'required|in:latihan,kegiatan,event',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'kategori']);
        $data['gambar'] = $request->file('gambar')->store('galeri', 'public');

        Galeri::create($data);

        return redirect()->route('admin.galeri.index')
                         ->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul'     => 'required|string|max:200',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'kategori'  => 'required|in:latihan,kegiatan,event',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'kategori']);

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($galeri->gambar);
            $data['gambar'] = $request->file('gambar')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')
                         ->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        Storage::disk('public')->delete($galeri->gambar);
        $galeri->delete();

        return redirect()->route('admin.galeri.index')
                         ->with('success', 'Foto galeri berhasil dihapus.');
    }
}
