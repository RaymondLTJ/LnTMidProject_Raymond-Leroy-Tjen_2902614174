<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'report';

    protected $fillable = [
        'magang_id',
        'tanggal_magang',
        'kegiatan_magang',
        'status'
    ];

    public function magang()
    {
        return $this->belongsTo(Magang::class);
    }

    public function user()
    {
        return $this->magang->user();
    }
}
