@extends('backend.layouts.app')
@section('title', 'Tambah Prestasi Baru')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Tambah Prestasi Baru</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('dashboard.admin') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="{{ route('prestasi.index') }}">Prestasi</a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Tambah Prestasi</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Tambah Prestasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('prestasi.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="id_siswa" class="form-label">Nama Siswa</label>
                                    <select name="id_siswa" id="id_siswa" class="form-control @error('id_siswa') is-invalid @enderror" required>
                                        <option value="">-- Pilih Siswa --</option>
                                        @foreach ($siswa as $s)
                                            <option value="{{ $s->id }}" {{ old('id_siswa') == $s->id ? 'selected' : '' }}>
                                                {{ $s->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_siswa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="id_kategori_indikator" class="form-label">Kategori Prestasi</label>
                                    <select name="id_kategori_indikator" id="id_kategori_indikator" class="form-control @error('id_kategori_indikator') is-invalid @enderror" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->id }}" {{ old('id_kategori_indikator') == $k->id ? 'selected' : '' }}>
                                                {{ $k->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_kategori_indikator')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="jam" class="form-label">Jam</label>
                                    <select name="jam" id="jam" class="form-control @error('jam') is-invalid @enderror" required>
                                        <option value="">-- Pilih Jam --</option>
                                    </select>
                                    @error('jam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="poin" class="form-label">Poin</label>
                                    <input type="text" name="poin" id="poin" class="form-control @error('poin') is-invalid @enderror" readonly value="{{ old('poin') }}" required>
                                    @error('poin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" id="tanggal" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}" required>
                                    @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="periode" class="form-label">Periode</label>
                                    <input type="text" name="periode" id="periode" class="form-control @error('periode') is-invalid @enderror" placeholder="Masukkan periode prestasi" value="{{ old('periode') }}" required>
                                    @error('periode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                <a href="{{ route('prestasi.index') }}" class="btn btn-secondary">Batal</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {

    $('#id_kategori_indikator').on('change', function() {
        let kategoriId = $(this).val();
        if(kategoriId){
            $.ajax({
                url: '{{ url("/get-jam-by-kategori") }}',
                type: 'GET',
                data: { id_kategori: kategoriId },
                success: function(res){
                    let jamSelect = $('#jam');
                    jamSelect.empty();
                    jamSelect.append('<option value="">-- Pilih Jam --</option>');
                    if(res.jam.length > 0){
                        $.each(res.jam, function(i, v){
                            jamSelect.append(`<option value="${v.jam}" data-poin="${v.poin}">${v.jam}</option>`);
                        });
                    } else {
                        jamSelect.append('<option value="">Data jam kosong, pilih kategori lain</option>');
                    }
                    $('#poin').val('');
                },
                error: function(){
                    alert('Gagal ambil data jam, coba lagi nanti!');
                }
            });
        } else {
            $('#jam').empty().append('<option value="">-- Pilih Jam --</option>');
            $('#poin').val('');
        }
    });

    // Pas jam dipilih, update poin otomatis
    $('#jam').on('change', function() {
        let poin = $(this).find(':selected').data('poin') || '';
        $('#poin').val(poin);
    });

    // Kalo mau, bisa tambah validasi atau fitur lain disini bro

});
</script>
@endsection
