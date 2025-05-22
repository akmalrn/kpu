@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Dashboard</h3>
            <h6 class="op-7 mb-2">Admin KPU</h6>
        </div>
    </div>

    <div class="row">
        @php
            $stat = [
                ['icon' => 'fas fa-users', 'color' => 'primary', 'label' => 'Siswa', 'value' => $SiswaTotal],
                ['icon' => 'fas fa-check-square', 'color' => 'info', 'label' => 'Kategori', 'value' => $KategoriTotal],
                ['icon' => 'fas fa-chart-bar', 'color' => 'success', 'label' => 'Indikator', 'value' => $IndikatorTotal],
                ['icon' => 'fas fa-medal', 'color' => 'secondary', 'label' => 'Prestasi', 'value' => $PrestasiTotal],
            ];
        @endphp
        @foreach ($stat as $s)
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center text-{{ $s['color'] }} bubble-shadow-small">
                                <i class="{{ $s['icon'] }}"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">{{ $s['label'] }}</p>
                                <h4 class="card-title">{{ $s['value'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-header">
                    <h4 class="card-title">Daftar Siswa</h4>
                </div>
                <div class="card-body">
                    @if($siswa->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <th>Nama</th>
                                        <th>NIS</th>
                                        <th>Kelas</th>
                                        <th>Tipe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($siswa as $s)
                                        <tr>
                                             <td>{{ $loop->iteration }}</td>
                                            <td>{{ $s->nama ?? '-' }}</td>
                                            <td>{{ $s->id ?? '-' }}</td>
                                            <td>{{ $s->kelas ?? '-' }}</td>
                                            <td>
                                            @if ($s->tipe == 'Unggulan')
                                                <span class="badge badge-success">Unggulan</span>
                                            @else
                                                <span class="badge badge-secondary">Reguler</span>
                                            @endif
                                        <td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">Belum ada data siswa.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
