<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasi';

    protected $fillable = [
        'id_siswa',
        'id_kategori_indikator',
        'tanggal',
        'periode',
        'poin',
        'jam',
    ];

   public function siswa()
   {
       return $this->belongsTo(Siswa::class, 'id_siswa');
   }


   public function kategoriIndikator()
   {
       return $this->belongsTo(KategoriIndikator::class, 'id_kategori_indikator');
   }
}
