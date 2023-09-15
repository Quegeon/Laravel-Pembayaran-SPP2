<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'keterangan',
        'kompetensi_keahlian'
    ];

    public function Kelas () {
        return $this->hasMany(Siswa::class, 'id_kelas', 'id');
    }
}
