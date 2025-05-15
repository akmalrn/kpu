@extends('backend.layouts.app')
@section('title', 'Tambah Indikator Baru')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Tambah Indikator Baru</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('dashboard.admin') }}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="{{ route('indikator.index') }}">Indikator</a></li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="#">Tambah Indikator</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Indikator Baru</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('indikator.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group form-group-default">
                                            <label for="poin">Poin</label>
                                            <input type="text" name="poin" id="poin"
                                                class="form-control @error('poin') is-invalid @enderror"
                                                placeholder="Masukkan poin indikator" required>
                                            @error('poin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group form-group-default">
                                            <label for="jam">Jam</label>
                                            <input type="text" name="jam" id="jam"
                                                class="form-control @error('jam') is-invalid @enderror"
                                                placeholder="Masukkan jam indikator" required>
                                            @error('jam')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <div class="form-group form-group-default">
                                            <label for="kategori_indikator_id">Kategori Indikator</label>
                                            <select name="kategori_indikator_id" id="kategori_indikator_id"
                                                class="form-control @error('kategori_indikator_id') is-invalid @enderror" required>
                                                <option value="">Pilih Kategori Indikator</option>
                                                @foreach($kategori_indikators as $kategori)
                                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori_indikator_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('indikator.index') }}" class="btn btn-secondary ms-2">Batal</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
