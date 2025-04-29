@extends('backend.layouts.app')
@section('title', 'Data Prestasi')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Data Prestasi</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('dashboard.admin') }}">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Prestasi</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data Prestasi</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Prestasi</h4>
                                <button class="btn btn-primary btn-round ms-auto"
                                    onclick="window.location.href='{{ route('prestasi.create') }}'">
                                    <i class="fa fa-plus"></i> Tambah Prestasi
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Siswa</th>
                                            <th>Kategori Indikator</th>
                                            <th>Tanggal</th>
                                            <th>Periode</th>
                                            <th style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($prestasis as $prestasi)
                                            <tr>
                                                <td>{{ $prestasi->id }}</td>
                                                <td>{{ $prestasi->siswa->nama }}</td>
                                                <td>{{ $prestasi->kategoriIndikator->nama }}</td>
                                                <td>{{ $prestasi->tanggal }}</td>
                                                <td>{{ $prestasi->periode }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('prestasi.edit', $prestasi->id) }}" class="btn btn-link btn-primary" data-bs-toggle="tooltip" title="Edit Prestasi">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('prestasi.destroy', $prestasi->id) }}" method="POST" id="delete-form-{{ $prestasi->id }}" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" data-bs-toggle="tooltip" title="Hapus Siswa" class="btn btn-link btn-danger" onclick="confirmDelete({{ $prestasi->id }})">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
