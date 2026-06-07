<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email', 'telepon', 'subjek', 'pesan', 'is_read'];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    /**
     * Scope: pesan yang belum dibaca
     */
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }
}
