@extends('backend.layouts.app')
@section('title', 'Data Siswa')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Siswa</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#"><i class="icon-home"></i></a>
                </li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Tables</a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Data Siswa</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Daftar Siswa</h4>
                        <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-round">
                            <i class="fa fa-plus me-1"></i> Tambah Siswa
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Tipe</th>
                                        <th>Total Poin</th> <!-- Kolom untuk total poin -->
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $s)
                                    <tr>
                                        <td>{{ $s->id }}</td>
                                        <td>{{ $s->nama }}</td>
                                        <td>{{ $s->kelas }}</td>
                                        <td>{{ $s->tipe }}</td>
                                        <td>
                                            @php
                                                // Hitung total poin siswa berdasarkan data prestasi
                                                $totalPoin = $s->prestasi->sum('poin');
                                            @endphp
                                            {{ $totalPoin }} <!-- Tampilkan total poin -->
                                        </td>
                                        <td>
                                            <div class="form-button-action d-flex">
                                                <form action="{{ route('siswa.edit', $s->id) }}" method="GET" style="margin-right: 5px;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit Siswa">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" id="delete-form-{{ $s->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Hapus Siswa" onclick="confirmDelete({{ $s->id }})">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive -->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div>
        </div>
    </div>
</div>
@endsection
