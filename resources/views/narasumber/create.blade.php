@extends('adminlte::page')

@section('title', 'Tambah Narasumber Kegiatan')

@section('content_header')
<h1 class="m-0 text-dark text-center">Tambah Narasumber Kegiatan</h1>
@stop

@section('content')
<form action="{{ route('users.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputName">Nama Narasumber Kegiatan</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="exampleInputName" placeholder="Nama NarasumberKegiatan" name="name" value="{{ old('name') }}">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">No Telephone</label>
                        <input type="text" name="notel" class="form-control" id="notel" placeholder="No. Telephone"
                            onkeypress="return onlyNumberKey(event)" required>
                        @error('number') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{ old('email') }}">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="exampleInputPassword" placeholder="Password" name="password">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword"
                            placeholder="Konfirmasi Password" name="password_confirmation">
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="/narasumberkegiatan" class="btn btn-primary">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop
