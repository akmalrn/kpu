<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'name', 
        'kelas', 
        'tipe',
    ];

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }
}
