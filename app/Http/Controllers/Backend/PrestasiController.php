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
        $indikator = Indikator::all();
        $SiswaTotal = Siswa::count();
        $KategoriTotal = KategoriIndikator::count();
        $IndikatorTotal = Indikator::count();
        $PrestasiTotal = Prestasi::count();
        return view('backend.prestasi.create', compact('siswa','indikator', 'kategori', 'SiswaTotal', 'KategoriTotal', 'IndikatorTotal', 'PrestasiTotal'));
    }
public function store(Request $request)
{
    $request->validate([
        'id_siswa' => 'required',
        'id_kategori_indikator' => 'required',
        'tanggal' => 'required|date',
        'jam' => 'required|numeric',
        'poin' => 'required|numeric',
        'periode' => 'required|string'
    ]);

    // Cek apakah sudah ada data yang sama (berdasarkan id_siswa, kategori, dan periode)
    $existing = Prestasi::where('id_siswa', $request->id_siswa)
        ->where('id_kategori_indikator', $request->id_kategori_indikator)
        ->where('periode', $request->periode)
        ->first();

    if ($existing) {
        // Jika sudah ada, tambahkan poin baru ke poin yang lama
        // Dengan menyimpan baris baru
        Prestasi::create([
            'id_siswa' => $request->id_siswa,
            'id_kategori_indikator' => $request->id_kategori_indikator,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'poin' => $request->poin,
            'periode' => $request->periode
        ]);
    } else {
        // Jika belum ada, bikin data baru
        Prestasi::create($request->all());
    }

    return redirect()->route('prestasi.index')->with('success', 'Data prestasi berhasil disimpan/diupdate.');
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
            'jam' => 'required|numeric',
            'periode' => 'required|string'
        ]);
        Prestasi::create([
            'id_siswa' => $request->id_siswa,
            'id_kategori_indikator' => $request->id_kategori_indikator,
            'jam' => $request->jam,
            'poin' => $request->poin,
            'tanggal' => $request->tanggal,
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
