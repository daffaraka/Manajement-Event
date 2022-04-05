@extends('adminlte::page')

@section('title', 'Show EO')

@section('content_header')
    <h1 class="m-0 text-dark">Show EO</h1>
@stop

@section('content')
 <form method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputName">Nama EO</label>
                            <input type="text" class="form-control"
                                 name="name" value="{{ $user->name ?? old('name') }}" disabled readonly>
                        </div>
                        <div class="form-group">
                            <label for="number">Nomor Telepon</label>
                            <input type="number" maxlength="13" class="form-control @error('number') is-invalid @enderror" id="number"
                                 name="number" value="{{ old('number') }}" disabled readonly>
                          </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Email</label>
                            <input type="email" class="form-control"
                                id="exampleInputEmail" name="email"value="{{ $user->email ?? old('email') }}" disabled readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAddress">Alamat</label>
                            <input type="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                id="exampleInputAddress" name="alamat" disabled readonly>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('eo.index') }}" class="btn btn-primary">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop
