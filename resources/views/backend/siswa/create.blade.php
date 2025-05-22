@extends('backend.layouts.app')
@section('title', 'Tambah Siswa Baru')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Tambah Siswa Baru</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('dashboard.admin') }}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="{{ route('siswa.index') }}">Siswa</a></li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="#">Tambah Siswa</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Siswa Baru</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('siswa.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group form-group-default">
                                            <label for="id">NIS</label>
                                            <input type="text" name="id" id="id"
                                                class="form-control @error('id') is-invalid @enderror"
                                                placeholder="Masukkan NIS Siswa" required>
                                            @error('id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group form-group-default">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" id="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                placeholder="Masukkan nama siswa" required>
                                            @error('nama')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                     <div class="col">
                                        <div class="form-group form-group-default">
                                            <label for="tipe">Tipe</label>
                                            <select name="tipe" id="tipe"
                                                class="form-control @error('tipe') is-invalid @enderror" required>
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="Unggulan">Unggulan</option>
                                                <option value="Reguler">Reguler</option>
                                            </select>
                                            @error('tipe')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group form-group-default">
                                            <label for="kelas">Kelas</label>
                                            <select name="kelas" id="kelas"
                                                class="form-control @error('kelas') is-invalid @enderror" required>
                                                <option value="">-- Pilih kelas --</option>
                                                <option value="12 PPLG">12 PPLG</option>
                                                <option value="11 PPLG">11 PPLG</option>
                                                <option value="10 PPLG">10 PPLG</option>
                                                <option value="12 PMN">12 PMN</option>
                                                <option value="11 PMN">11 PMN</option>
                                                <option value="10 PMN">10 PMN</option>
                                                <option value="12 HTL">12 HTL</option>
                                                <option value="11 HTL">11 HTL</option>
                                                <option value="10 HTL">10 HTL</option>
                                                <option value="12 TJKT">12 TJKT</option>
                                                <option value="11 TJKT">11 TJKT</option>
                                                <option value="10 TJKT">10 TJKT</option>
                                            </select>
                                            @error('kelas')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group form-group-default">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Masukkan password siswa" required>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('siswa.index') }}" class="btn btn-secondary ms-2">Batal</a>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
