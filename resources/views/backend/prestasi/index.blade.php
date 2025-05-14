@extends('backend.layouts.app')
@section('title', 'Data Prestasi')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Prestasi</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home"><a href="#"><i class="icon-home"></i></a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Prestasi</a></li>
            </ul>
        </div>



        {{-- Tabel Data Prestasi --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">List Inputan Prestasi</h4>
                        <a href="{{ route('prestasi.create') }}" class="btn btn-primary btn-round">
                            <i class="fa fa-plus me-1"></i> Tambah Prestasi
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>Kategori</th>
                                        <th>Jam</th>
                                        <th>Poin</th>
                                        <th>Tanggal Input</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prestasis as $key => $p)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $p->siswa->nama ?? '-' }}</td>
                                        <td>{{ $p->kategoriIndikator->nama ?? '-' }}</td>
                                        <td>{{ $p->jam }}</td>
                                        <td>{{ $p->poin }}</td>
                                        <td>{{ $p->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <form action="{{ route('prestasi.destroy', $p->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin lu mau hapus?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
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
