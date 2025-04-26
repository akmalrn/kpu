@extends('backend.layouts.app')
@section('title', 'Tambah Prestasi Baru')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Tambah Prestasi Baru</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('dashboard.admin') }}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="{{ route('prestasi.index') }}">Prestasi</a></li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="#">Tambah Prestasi</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Tambah Prestasi</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('prestasi.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="id_siswa">Nama Siswa</label>
                                        <select name="id_siswa" id="id_siswa"
                                            class="form-control @error('id_siswa') is-invalid @enderror" required>
                                            <option value="">Pilih Siswa</option>
                                            @foreach ($siswa as $siswa)
                                                <option value="{{ $siswa->id }}"
                                                    {{ old('id_siswa', $prestasi->id_siswa ?? '') == $siswa->id ? 'selected' : '' }}>
                                                    {{ $siswa->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_siswa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="id_kategori_indikator">Kategori Prestasi</label>
                                        <select name="id_kategori_indikator" id="id_kategori_indikator"
                                            class="form-control @error('id_kategori_indikator') is-invalid @enderror"
                                            required>
                                            <option value="">Pilih Kategori Prestasi</option>
                                            @foreach ($kategori as $kategori)
                                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_kategori_indikator')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>                                   
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group form-group-default">
                                            <label for="tanggal">Tanggal</label>
                                            <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                                            @error('tanggal')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group form-group-default">
                                            <label for="periode">Periode</label>
                                            <input type="text" name="periode" id="periode"
                                                class="form-control @error('periode') is-invalid @enderror"
                                                placeholder="Masukkan periode prestasi" required>
                                            @error('periode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('prestasi.index') }}" class="btn btn-secondary ms-2">Batal</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
