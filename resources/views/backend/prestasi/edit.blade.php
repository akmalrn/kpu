@extends('backend.layouts.app')
@section('title', 'Edit Prestasi')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Prestasi</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('dashboard.admin') }}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="{{ route('prestasi.index') }}">Prestasi</a></li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="#">Edit Prestasi</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Edit Prestasi</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('prestasi.update', $prestasi->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col">
                                        <label for="id_siswa">Nama Siswa</label>
                                        <select name="id_siswa" id="id_siswa"
                                            class="form-control @error('id_siswa') is-invalid @enderror" required>
                                            <option value="">Pilih Siswa</option>
                                            @foreach ($siswa as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('id_siswa', $prestasi->id_siswa) == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}
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
                                            @foreach ($kategori as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('id_kategori_indikator', $prestasi->id_kategori_indikator) == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}
                                                </option>
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
                                            <input type="date" id="tanggal" name="tanggal"
                                                value="{{ old('tanggal', $prestasi->tanggal) }}"
                                                class="form-control" required>
                                            @error('tanggal')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
