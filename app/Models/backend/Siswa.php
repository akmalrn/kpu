<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'id',
        'nama',
        'kelas',
        'tipe',
        'password',
    ];

// Model Siswa
public function prestasi()
{
    return $this->hasMany(Prestasi::class, 'id_siswa');
}

}
