@extends('adminlte::page')

@section('title', 'Detail Pelaporan')

@section('content_header')
    <h1 class="m-0 text-dark">Detail Pelaporan</h1>
@stop

@section('content')
    <form action="" method="post">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group ">
                            <label for="text">Persiapan</label>
                            <input type="text" class="form-control @error('persiapan') is-invalid @enderror" id="text"
                                placeholder="....." name="persiapan"
                                value="{{ $pelaporan->persiapan ?? old('persiapan') }}" disabled readonly>
                            @error('persiapan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group disabled">
                            <label for="text">Pelaksanaan</label>
                            <input type="pelaksanaan" class="form-control @error('pelaksanaan') is-invalid @enderror"
                                id="text" placeholder="......" name="pelaksanaan"
                                value="{{ $pelaporan->pelaksanaan ?? old('pelaksanaan') }}" disabled readonly>
                            @error('pelaksanaan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group disabled">
                            <label for="text">Paska Pelaksanaan</label>
                            <input type="paskapelaksanaan"
                                class="form-control @error('paskapelaksanaan') is-invalid @enderror" id="text"
                                placeholder="......" name="paskapelaksanaan"
                                value="{{ $pelaporan->paskapelaksanaan ?? old('paskapelaksanaan') }}" disabled readonly>
                            @error('paskapelaksanaan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group disabled">
                            <label for="text">Efektifitas</label>
                            <input type="efektifitas" class="form-control @error('efektifitas') is-invalid @enderror"
                                id="text" placeholder="......" name="efektifitas"
                                value="{{ $pelaporan->efektifitas ?? old('efektifitas') }}" disabled readonly>
                            @error('efektifitas')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <a href="" class="btn btn-default">
                            KEMBALI
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop
