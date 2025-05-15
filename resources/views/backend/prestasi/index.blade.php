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

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">List Inputan Prestasi</h4>
                            <div>
                                <a href="{{ route('prestasi.create') }}" class="btn btn-primary btn-round">
                                    <i class="fa fa-plus me-1"></i> Tambah Prestasi
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="accordionPrestasi">
                                @foreach ($prestasis->groupBy('id_siswa') as $siswaId => $prestasiGroup)
                                    <div class="card mb-2">
                                        <div class="card-header" id="heading-{{ $siswaId }}">
                                            <h5 class="mb-0 d-flex justify-content-between align-items-center">
                                                <button class="btn btn-link" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse-{{ $siswaId }}" aria-expanded="true"
                                                    aria-controls="collapse-{{ $siswaId }}">
                                                    {{ $prestasiGroup->first()->siswa->nama ?? 'Tanpa Nama' }}
                                                </button>
                                                <span class="badge bg-secondary">{{ $prestasiGroup->count() }}
                                                    Prestasi</span>
                                            </h5>
                                        </div>

                                        <div id="collapse-{{ $siswaId }}" class="collapse"
                                            aria-labelledby="heading-{{ $siswaId }}"
                                            data-bs-parent="#accordionPrestasi">
                                            <div class="card-body table-responsive">
                                                <a href="{{ route('prestasi.pdf', ['id_siswa' => $siswaId]) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fa fa-download me-1"></i> Download PDF
                                                </a>
                                                <table class="table table-bordered table-sm">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Jam</th>
                                                            <th>Poin</th>
                                                            <th>Tanggal</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($prestasiGroup as $p)
                                                            <tr>
                                                                <td>{{ $p->jam }}</td>
                                                                <td>{{ $p->poin }}</td>
                                                                <td>{{ $p->created_at->format('d-m-Y') }}</td>
                                                                <td>
                                                                    <form action="{{ route('prestasi.destroy', $p->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-sm btn-danger"
                                                                            onclick="return confirm('Yakin lu mau hapus?')">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
