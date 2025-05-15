<?php

namespace App\Models\Backend;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{

    use Notifiable;

    protected $table = 'siswa';

    protected $fillable = [
        'id',
        'nama',
        'kelas',
        'tipe',
        'password',
    ];

public function prestasi()
{
    return $this->hasMany(Prestasi::class, 'id_siswa');
}
public function kategoriIndikator()
{
    return $this->belongsTo(KategoriIndikator::class, 'id_kategori_indikator');
}

}
