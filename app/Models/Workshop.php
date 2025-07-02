<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Workshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'pemateri',
        'waktu',
        'lokasi',
        'detail',
        'harga', 
    ];

    public function pendaftarans() 
    {
        return $this->hasMany(Pendaftaran::class);
    }
}

