@extends('backend.layouts.app')
@section('title', 'Edit Indikator')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Indikator</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('dashboard.admin') }}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="{{ route('indikator.index') }}">Indikator</a></li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="#">Edit</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Indikator</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('indikator.update', $indikator->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="poin">Poin</label>
                                            <input type="text" name="poin" id="poin" class="form-control @error('poin') is-invalid @enderror" value="{{ $indikator->poin }}" required>
                                            @error('poin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="jam">Jam</label>
                                            <input type="text" name="jam" id="jam" class="form-control @error('jam') is-invalid @enderror" value="{{ $indikator->jam }}" required>
                                            @error('jam')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="kategori_indikator_id">Kategori Indikator</label>
                                            <select name="kategori_indikator_id" id="kategori_indikator_id" class="form-control @error('kategori_indikator_id') is-invalid @enderror" required>
                                                <option value="">Pilih Kategori Indikator</option>
                                                @foreach($kategori_indikators as $kategori)
                                                    <option value="{{ $kategori->id }}" @if($indikator->kategori_indikator_id == $kategori->id) selected @endif>{{ $kategori->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori_indikator_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('indikator.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
