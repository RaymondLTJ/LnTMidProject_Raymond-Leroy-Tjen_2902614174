<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magang extends Model
{
    use HasFactory;
    protected $table = 'magang';

    protected $fillable = [
        'user_id',
        'perusahaan_id',
        'judul_magang',
        'mulai_magang',
        'selesai_magang',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
