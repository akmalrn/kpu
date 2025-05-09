<?php

namespace App\Models\Backend;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{

    use Notifiable;
    
    protected $table = 'siswa';

    protected $guard = 'siswa';

    protected $fillable = [
        'id',
        'nama',
        'kelas',
        'tipe',
        'password',
    ];

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }
}
