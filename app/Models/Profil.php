<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'judul', 'konten', 'gambar'];

    /**
     * Ambil nilai profil berdasarkan key
     */
    public static function getValue(string $key): ?self
    {
        return static::where('key', $key)->first();
    }
}
