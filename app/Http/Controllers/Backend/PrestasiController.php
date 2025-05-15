<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Indikator;
use App\Models\Backend\KategoriIndikator;
use App\Models\Backend\Prestasi;
use App\Models\Backend\Siswa;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
        return view('backend.prestasi.create', compact('siswa', 'indikator', 'kategori', 'SiswaTotal', 'KategoriTotal', 'IndikatorTotal', 'PrestasiTotal'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required',
            'tanggal' => 'required|date',
            'jam' => 'required|numeric',
            'poin' => 'required|numeric',
        ]);

        Prestasi::create([
            'id_siswa' => $request->id_siswa,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'poin' => $request->poin,
        ]);

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
            'tanggal' => 'required|date',
            'jam' => 'required|numeric',
            'periode' => 'required|string'
        ]);
        Prestasi::create([
            'id_siswa' => $request->id_siswa,
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
    public function getJamByKategori(Request $request)
    {
        $kategoriId = $request->input('id_kategori');
        $indikators = Indikator::where('kategori_indikator_id', $kategoriId)->get(['jam', 'poin']);

        return response()->json(['jam' => $indikators]);
    }

    public function downloadPdf($id_siswa)
    {
        $prestasis = Prestasi::where('id_siswa', $id_siswa)->get();
        $siswa = Siswa::findOrFail($id_siswa);
        $pdf = pdf::loadView('backend.prestasi.pdf', compact('prestasis', 'siswa'));

        return $pdf->download("prestasi_{$siswa->nama}.pdf");
    }
}
