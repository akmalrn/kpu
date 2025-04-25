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
    ];

   public function siswa()
   {
       return $this->belongsTo(Siswa::class);
   }

   public function kategori_indikator()
   {
       return $this->belongsTo(KategoriIndikator::class);
   }
}
