<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Indikator;
use App\Models\Backend\KategoriIndikator;
use App\Models\Backend\Prestasi;
use App\Models\Backend\Siswa;
use Illuminate\Http\Request;

class KategoriIndikatorController extends Controller
{
    public function index()
    {
        $kategoriIndikators = KategoriIndikator::all(); 
        $SiswaTotal = Siswa::count();
        $KategoriTotal = KategoriIndikator::count();
        $IndikatorTotal = Indikator::count();
        $PrestasiTotal = Prestasi::count();
        return view('backend.indikator.kategori.index', compact('kategoriIndikators', 'SiswaTotal', 'KategoriTotal', 'IndikatorTotal', 'PrestasiTotal'));
    }

    public function create()
    {
        $SiswaTotal = Siswa::count();
        $KategoriTotal = KategoriIndikator::count();
        $IndikatorTotal = Indikator::count();
        $PrestasiTotal = Prestasi::count();
        return view('backend.indikator.kategori.create', compact('SiswaTotal', 'KategoriTotal', 'IndikatorTotal', 'PrestasiTotal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        KategoriIndikator::create($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori Indikator berhasil dibuat!');
    }

    public function edit($id)
    {
        $KategoriIndikator = KategoriIndikator::findOrFail($id);
        $SiswaTotal = Siswa::count();
        $KategoriTotal = KategoriIndikator::count();
        $IndikatorTotal = Indikator::count();
        $PrestasiTotal = Prestasi::count();
        return view('backend.indikator.kategori.edit', compact('KategoriIndikator', 'SiswaTotal', 'KategoriTotal', 'IndikatorTotal', 'PrestasiTotal'));
    }

    public function update(Request $request, KategoriIndikator $kategoriIndikator)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategoriIndikator->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori Indikator berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $KategoriIndikator = KategoriIndikator::findOrFail($id);
        $KategoriIndikator->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori Indikator berhasil dihapus!');
    }
}
