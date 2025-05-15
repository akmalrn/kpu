<?php

namespace Database\Seeders;

use App\Models\Backend\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::Create([
            'id' => '12200765',
            'nama' => 'Siswa 1',
            'kelas' => 'XII PPLG',
            'tipe' => 'reguler',
            'password' => Hash::make('123')
        ]);

        Siswa::Create([
            'id' => '12200766',
            'nama' => 'Siswa 1',
            'kelas' => 'XII PPLG',
            'tipe' => 'reguler',
            'password' => Hash::make('123')
        ]);

        Siswa::Create([
            'id' => '12200767',
            'nama' => 'Siswa 1',
            'kelas' => 'XII PPLG',
            'tipe' => 'reguler',
            'password' => Hash::make('123')
        ]);
    }
}
