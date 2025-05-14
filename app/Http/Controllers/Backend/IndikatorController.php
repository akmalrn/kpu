<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Indikator;
use App\Models\Backend\KategoriIndikator;
use App\Models\Backend\Prestasi;
use App\Models\Backend\Siswa;
use Illuminate\Http\Request;

class IndikatorController extends Controller
{
    public function index()
    {
        $indikators = Indikator::all();
        $SiswaTotal = Siswa::count();
        $KategoriTotal = KategoriIndikator::count();
        $IndikatorTotal = Indikator::count();
        $PrestasiTotal = Prestasi::count();
        return view('backend.indikator.index', compact('indikators', 'SiswaTotal', 'KategoriTotal', 'IndikatorTotal', 'PrestasiTotal'));
    }

    public function create()
    {
        $kategori_indikators = KategoriIndikator::all();
        $SiswaTotal = Siswa::count();
        $KategoriTotal = KategoriIndikator::count();
        $IndikatorTotal = Indikator::count();
        $PrestasiTotal = Prestasi::count();
        return view('backend.indikator..create', compact('kategori_indikators', 'SiswaTotal', 'KategoriTotal', 'IndikatorTotal', 'PrestasiTotal'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_indikator_id' => 'required|exists:kategori_indikator,id',
            'poin' => 'required|string|max:255',
            'jam' => 'required|string|max:255',
        ]);

        Indikator::create($validated);

        return redirect()->route('indikator.index')->with('success', 'Indikator berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $indikator = Indikator::findOrFail($id);
        $kategori_indikators = KategoriIndikator::all();
        $SiswaTotal = Siswa::count();
        $KategoriTotal = KategoriIndikator::count();
        $IndikatorTotal = Indikator::count();
        $PrestasiTotal = Prestasi::count();
        return view('backend.indikator..edit', compact('indikator', 'kategori_indikators', 'SiswaTotal', 'KategoriTotal', 'IndikatorTotal', 'PrestasiTotal'));
    }

    public function update(Request $request, Indikator $indikator)
    {
        $validated = $request->validate([
            'kategori_indikator_id' => 'required|exists:kategori_indikator,id',
            'poin' => 'required|string|max:255',
            'jam' => 'required|string|max:255',
        ]);

        $indikator->update($validated);

        return redirect()->route('indikator.index')->with('success', 'Indikator berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $indikator = Indikator::findOrFail($id);
        $indikator->delete();

        return redirect()->route('indikator.index')->with('success', 'Indikator berhasil dihapus.');
    }
}
