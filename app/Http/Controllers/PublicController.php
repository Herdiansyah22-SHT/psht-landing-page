<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Pesan;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PublicController extends Controller
{
    /**
     * BERANDA - Hero, Sambutan, Berita Terbaru
     */
    public function beranda()
    {
        $sambutan   = Profil::getValue('sambutan');
        $beritaTerbaru = Berita::published()
                            ->latest('tanggal_publikasi')
                            ->take(3)
                            ->get();
        $galeriTerbaru = Galeri::latest()->take(6)->get();

        return view('public.beranda', compact('sambutan', 'beritaTerbaru', 'galeriTerbaru'));
    }

    /**
     * PROFIL - Sejarah, Visi Misi, Struktur Organisasi
     */
    public function profil()
    {
        $sejarah  = Profil::getValue('sejarah');
        $visi     = Profil::getValue('visi');
        $misi     = Profil::getValue('misi');
        $struktur = Profil::getValue('struktur');

        return view('public.profil', compact('sejarah', 'visi', 'misi', 'struktur'));
    }

    /**
     * BERITA - Daftar semua berita & kegiatan
     */
    public function berita(Request $request)
    {
        $kategori = $request->get('kategori');
        $query = Berita::published()->latest('tanggal_publikasi');

        if ($kategori && in_array($kategori, ['berita', 'kegiatan'])) {
            $query->where('kategori', $kategori);
        }

        $beritas = $query->paginate(9);
        return view('public.berita.index', compact('beritas', 'kategori'));
    }

    /**
     * BERITA DETAIL - Detail satu artikel
     */
    public function beritaDetail(string $slug)
    {
        $berita = Berita::published()->where('slug', $slug)->firstOrFail();
        $lainnya = Berita::published()
                        ->where('id', '!=', $berita->id)
                        ->latest('tanggal_publikasi')
                        ->take(3)
                        ->get();

        return view('public.berita.detail', compact('berita', 'lainnya'));
    }

    /**
     * GALERI - Tampilkan semua foto
     */
    public function galeri(Request $request)
    {
        $kategori = $request->get('kategori');
        $query = Galeri::latest();

        if ($kategori && in_array($kategori, ['latihan', 'kegiatan', 'event'])) {
            $query->where('kategori', $kategori);
        }

        $galeris = $query->paginate(12);
        return view('public.galeri', compact('galeris', 'kategori'));
    }

    /**
     * KONTAK - Tampilkan form kontak
     */
    public function kontak()
    {
        return view('public.kontak');
    }

    /**
     * KIRIM PESAN - Simpan pesan dari form kontak
     */
    public function kirimPesan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'telepon' => 'nullable|string|max:20',
            'subjek'  => 'required|string|max:150',
            'pesan'   => 'required|string|min:10',
        ], [
            'nama.required'    => 'Nama wajib diisi.',
            'email.required'   => 'Email wajib diisi.',
            'email.email'      => 'Format email tidak valid.',
            'subjek.required'  => 'Subjek wajib diisi.',
            'pesan.required'   => 'Pesan wajib diisi.',
            'pesan.min'        => 'Pesan minimal 10 karakter.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Pesan::create($request->only(['nama', 'email', 'telepon', 'subjek', 'pesan']));

        return back()->with('success', 'Pesan Anda telah berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}
