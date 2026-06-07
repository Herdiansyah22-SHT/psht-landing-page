<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;

class PesanController extends Controller
{
    public function index()
    {
        $pesans = Pesan::latest()->paginate(15);
        return view('admin.pesan.index', compact('pesans'));
    }

    public function show(int $id)
    {
        $pesan = Pesan::findOrFail($id);

        // Tandai sebagai sudah dibaca
        if (!$pesan->is_read) {
            $pesan->update(['is_read' => true]);
        }

        return view('admin.pesan.show', compact('pesan'));
    }

    public function destroy(int $id)
    {
        $pesan = Pesan::findOrFail($id);
        $pesan->delete();

        return redirect()->route('admin.pesan.index')
                         ->with('success', 'Pesan dari "' . $pesan->nama . '" berhasil dihapus.');
    }
}
