<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Indikator;
use App\Models\Backend\KategoriIndikator;
use App\Models\Backend\Prestasi;
use App\Models\Backend\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index(Request $request)
{
    $query = Siswa::with('prestasi');

    if ($request->filled('search')) {
        $search = $request->search;
        $query->where('nama', 'like', '%' . $search . '%');
    }

    $siswa = $query->get()->map(function ($item) {
        $item->total_poin = $item->prestasi->sum('poin');
        return $item;
    })->sortByDesc('total_poin');

    $SiswaTotal = Siswa::count();
    $KategoriTotal = KategoriIndikator::count();
    $IndikatorTotal = Indikator::count();
    $PrestasiTotal = Prestasi::count();

    return view('backend.siswa.index', compact(
        'siswa',
        'SiswaTotal',
        'KategoriTotal',
        'IndikatorTotal',
        'PrestasiTotal'
    ));
}


    public function create()
    {
        $SiswaTotal = Siswa::count();
        $KategoriTotal = KategoriIndikator::count();
        $IndikatorTotal = Indikator::count();
        $PrestasiTotal = Prestasi::count();
        return view('backend.siswa.create', compact('SiswaTotal', 'KategoriTotal', 'IndikatorTotal', 'PrestasiTotal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|unique:siswa,id',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'tipe' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        Siswa::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'tipe' => $request->tipe,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $SiswaTotal = Siswa::count();
        $KategoriTotal = KategoriIndikator::count();
        $IndikatorTotal = Indikator::count();
        $PrestasiTotal = Prestasi::count();
        return view('backend.siswa.edit', compact('siswa', 'SiswaTotal', 'KategoriTotal', 'IndikatorTotal', 'PrestasiTotal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required|integer|unique:siswa,id,' . $id,
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        $siswa = Siswa::findOrFail($id);

        $data = $request->only(['id', 'nama', 'kelas', 'tipe']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $siswa->update($data);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }
}
