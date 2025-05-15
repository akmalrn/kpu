<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Indikator;
use App\Models\Backend\KategoriIndikator;
use App\Models\Backend\Prestasi;
use App\Models\Backend\Siswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('prestasi')
            ->get()
            ->map(function ($item) {
                $item->total_poin = $item->prestasi->sum('poin');
                return $item;
            })
            ->sortByDesc('total_poin');
        $SiswaTotal = $siswa->count();
        $KategoriTotal = KategoriIndikator::count();
        $IndikatorTotal = Indikator::count();
        $PrestasiTotal = Prestasi::count();

        return view('backend.index', compact(
            'siswa',
            'SiswaTotal',
            'KategoriTotal',
            'IndikatorTotal',
            'PrestasiTotal'
        ));
    }
}
