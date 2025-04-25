<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $table = 'indikator';

    protected $fillable = [
        'kategori_indikator_id',
        'poin',
        'jam',
        'grade',
    ];

    public $timestamps = false;

    public function kategori_indikator()
    {
        return $this->belongsTo(KategoriIndikator::class);
    }   
}
