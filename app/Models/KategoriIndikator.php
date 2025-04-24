<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriIndikator extends Model
{
    protected $table = 'kategori_indikator';

    protected $fillable = [
        'nama',
    ];

    public function indikator()
    {
        return $this->hasMany(Indikator::class);
    }
}
