@extends('backend.layouts.app')
@section('title', 'Edit Siswa')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Siswa</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('dashboard.admin') }}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="{{ route('siswa.index') }}">Siswa</a></li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="#">Edit</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Siswa</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group form-group-default">
                                            <label for="id">Id</label>
                                            <input type="id" name="id" id="id"
                                                class="form-control @error('id') is-invalid @enderror"
                                                value="{{ $siswa->id }}" required>
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
                                                value="{{ $siswa->nama }}" required>
                                            @error('nama')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                                                    <div class="col">
                                        <div class="form-group form-group-default">
                                            <label for="tipe">Tipe</label>
                                            <select name="tipe" id="tipe"
                                                class="form-control @error('kelas') is-invalid @enderror" required>
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="Unggulan"
                                                    {{ old('tipe', $siswa->kelas) == 'Unggulan' ? 'selected' : '' }}>Unggulan
                                                    </option>
                                                     <option value="Reguler"
                                                    {{ old('tipe', $siswa->kelas) == 'Reguler' ? 'selected' : '' }}>Reguler
                                                     </option>
                                            </select>
                                            @error('kelas')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group form-group-default">
                                            <label for="kelas">Kelas</label>
                                            <select name="kelas" id="kelas"
                                                class="form-control @error('kelas') is-invalid @enderror" required>
                                                <option value="">-- Pilih Kelas --</option>
                                                <option value="12 PPLG"
                                                    {{ old('kelas', $siswa->kelas) == '12 PPLG' ? 'selected' : '' }}>12
                                                    PPLG</option>
                                                <option value="11 PPLG"
                                                    {{ old('kelas', $siswa->kelas) == '11 PPLG' ? 'selected' : '' }}>11
                                                    PPLG</option>
                                                <option value="10 PPLG"
                                                    {{ old('kelas', $siswa->kelas) == '10 PPLG' ? 'selected' : '' }}>10
                                                    PPLG</option>
                                                <option value="12 PMN"
                                                    {{ old('kelas', $siswa->kelas) == '12 PMN' ? 'selected' : '' }}>12 PMN
                                                </option>
                                                <option value="11 PMN"
                                                    {{ old('kelas', $siswa->kelas) == '11 PMN' ? 'selected' : '' }}>11 PMN
                                                </option>
                                                <option value="10 PMN"
                                                    {{ old('kelas', $siswa->kelas) == '10 PMN' ? 'selected' : '' }}>10 PMN
                                                </option>
                                                <option value="12 HTL"
                                                    {{ old('kelas', $siswa->kelas) == '12 HTL' ? 'selected' : '' }}>12 HTL
                                                </option>
                                                <option value="11 HTL"
                                                    {{ old('kelas', $siswa->kelas) == '11 HTL' ? 'selected' : '' }}>11 HTL
                                                </option>
                                                <option value="10 HTL"
                                                    {{ old('kelas', $siswa->kelas) == '10 HTL' ? 'selected' : '' }}>10 HTL
                                                </option>
                                                <option value="12 TJKT"
                                                    {{ old('kelas', $siswa->kelas) == '12 TJKT' ? 'selected' : '' }}>12
                                                    TJKT</option>
                                                <option value="11 TJKT"
                                                    {{ old('kelas', $siswa->kelas) == '11 TJKT' ? 'selected' : '' }}>11
                                                    TJKT</option>
                                                <option value="10 TJKT"
                                                    {{ old('kelas', $siswa->kelas) == '10 TJKT' ? 'selected' : '' }}>10
                                                    TJKT</option>
                                            </select>
                                            @error('kelas')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group form-group-default">
                                                <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                                                <input type="password" name="password" id="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Masukkan password baru (opsional)">
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('siswa.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
