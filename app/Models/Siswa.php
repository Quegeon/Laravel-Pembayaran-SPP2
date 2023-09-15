<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Siswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'nis';

    protected $fillable = [
        'nis',
        'id_kelas',
        'nama',
        'no_telp',
        'email'
    ];

    public function Siswa () {
        return $this->hasMany(Siswa::class, 'nis', 'nis');
    }

    public function Kelas () {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    } 
}
