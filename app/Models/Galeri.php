<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'deskripsi', 'gambar', 'kategori'];

    /**
     * URL gambar lengkap
     */
    public function getGambarUrlAttribute(): string
    {
        return asset('storage/' . $this->gambar);
    }
}
