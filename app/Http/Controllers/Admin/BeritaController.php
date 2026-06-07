<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'             => 'required|string|max:255',
            'isi'               => 'required|string',
            'gambar'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'kategori'          => 'required|in:berita,kegiatan',
            'is_published'      => 'nullable|boolean',
            'tanggal_publikasi' => 'nullable|date',
        ]);

        $data = $request->only(['judul', 'isi', 'kategori', 'tanggal_publikasi']);
        $data['is_published']      = $request->boolean('is_published');
        $data['tanggal_publikasi'] = $request->tanggal_publikasi ?? now();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')
                         ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(Berita $beritum)
    {
        return view('admin.berita.show', ['berita' => $beritum]);
    }

    public function edit(Berita $beritum)
    {
        return view('admin.berita.edit', ['berita' => $beritum]);
    }

    public function update(Request $request, Berita $beritum)
    {
        $request->validate([
            'judul'             => 'required|string|max:255',
            'isi'               => 'required|string',
            'gambar'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'kategori'          => 'required|in:berita,kegiatan',
            'is_published'      => 'nullable|boolean',
            'tanggal_publikasi' => 'nullable|date',
        ]);

        $data = $request->only(['judul', 'isi', 'kategori', 'tanggal_publikasi']);
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('gambar')) {
            if ($beritum->gambar) {
                Storage::disk('public')->delete($beritum->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $beritum->update($data);

        return redirect()->route('admin.berita.index')
                         ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $beritum)
    {
        if ($beritum->gambar) {
            Storage::disk('public')->delete($beritum->gambar);
        }
        $beritum->delete();

        return redirect()->route('admin.berita.index')
                         ->with('success', 'Berita berhasil dihapus.');
    }
}
