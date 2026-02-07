<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';

    protected $fillable = [
        'nama_perusahaan',
        'alamat_perusahaan',
        'telp'
    ];

    public function magang()
    {
        return $this->hasMany(Magang::class);
    }
}
