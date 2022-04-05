@extends('adminlte::page')

@section('title', 'Tambah Laporan')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Laporan</h1>
@stop

@section('content')
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="text">Persiapan</label>
                            <input type="text" class="form-control @error('persiapan') is-invalid @enderror" id="text"
                                placeholder="....." name="persiapan" value="{{ old('persiapan') }}">
                            @error('persiapan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="text">Pelaksanaan</label>
                            <input type="text" class="form-control @error('pelaksanaan') is-invalid @enderror"
                                id="text" placeholder="Masukkan Tanggal Pelaksanaan" name="pelaksanaan"
                                value="{{ old('pelaksanaan') }}">
                            @error('pelaksanaan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="text">Paska Pelaksanaan</label>
                            <input type="text" class="form-control @error('paskapelaksanaan') is-invalid @enderror"
                                id="text" placeholder="....." name="paskapelaksanaan">
                            @error('paskapelaksanaan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="text">Efektifitas</label>
                            <input type="text" class="form-control" id="text"
                                placeholder="....." name="efektifitas">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info"><a href="{{ route('pelaporan.index') }}">Simpan</a></button>
                        <a href="{{ route('pelaporan.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop
