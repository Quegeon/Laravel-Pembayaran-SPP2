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
        'keahlian_kompetensi'
    ];

    public function Kelas () {
        return $this->hasMany(Siswa::class, 'id_spp', 'id');
    }
}
