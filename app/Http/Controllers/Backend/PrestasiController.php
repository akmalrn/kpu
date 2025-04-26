<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Indikator;
use App\Models\Backend\KategoriIndikator;
use App\Models\Backend\Prestasi;
use App\Models\Backend\Siswa;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::with(['siswa', 'kategoriIndikator'])->get();
        $SiswaTotal = Siswa::count();
        $KategoriTotal = KategoriIndikator::count();
        $IndikatorTotal = Indikator::count();
        $PrestasiTotal = Prestasi::count();
        return view('backend.prestasi.index', compact('prestasis', 'SiswaTotal', 'KategoriTotal', 'IndikatorTotal', 'PrestasiTotal'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        $kategori = KategoriIndikator::all();
        $SiswaTotal = Siswa::count();
        $KategoriTotal = KategoriIndikator::count();
        $IndikatorTotal = Indikator::count();
        $PrestasiTotal = Prestasi::count();
        return view('backend.prestasi.create', compact('siswa', 'kategori', 'SiswaTotal', 'KategoriTotal', 'IndikatorTotal', 'PrestasiTotal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required',
            'id_kategori_indikator' => 'required',
            'tanggal' => 'required|date',
            'periode' => 'required|string'
        ]);

        Prestasi::create($request->all());
        return redirect()->route('prestasi.index')->with('success', 'Data prestasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $siswa = Siswa::all();
        $kategori = KategoriIndikator::all();
        $SiswaTotal = Siswa::count();
        $KategoriTotal = KategoriIndikator::count();
        $IndikatorTotal = Indikator::count();
        $PrestasiTotal = Prestasi::count();
        return view('backend.prestasi.edit', compact('prestasi', 'siswa', 'kategori', 'SiswaTotal', 'KategoriTotal', 'IndikatorTotal', 'PrestasiTotal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_siswa' => 'required',
            'id_kategori_indikator' => 'required',
            'tanggal' => 'required|date',
            'periode' => 'required|string'
        ]);

        $prestasi = Prestasi::findOrFail($id);
        $prestasi->update($request->all());

        return redirect()->route('prestasi.index')->with('success', 'Data prestasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Prestasi::destroy($id);
        return redirect()->route('prestasi.index')->with('success', 'Data prestasi berhasil dihapus.');
    }
}
