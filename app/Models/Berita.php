<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'slug', 'isi', 'gambar',
        'kategori', 'is_published', 'tanggal_publikasi'
    ];

    protected $casts = [
        'is_published'       => 'boolean',
        'tanggal_publikasi'  => 'datetime',
    ];

    /**
     * Auto-generate slug dari judul
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($berita) {
            $berita->slug = Str::slug($berita->judul) . '-' . time();
            if (!$berita->tanggal_publikasi) {
                $berita->tanggal_publikasi = now();
            }
        });
    }

    /**
     * Scope: hanya yang sudah dipublish
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * URL gambar lengkap
     */
    public function getGambarUrlAttribute(): string
    {
        return $this->gambar
            ? asset('storage/' . $this->gambar)
            : asset('images/no-image.jpg');
    }
}
