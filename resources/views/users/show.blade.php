@extends('adminlte::page')

@section('title', 'Show Users')

@section('content_header')
<h1 class="m-0 text-dark">Show Users</h1>
@stop

@section('content')
<form action="{{ route('users.update', $user) }}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="exampleInputName" placeholder="Nama lengkap" name="name"
                            value="{{ $user->name ?? old('name') }}" readonly>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            id="exampleInputEmail" placeholder="Masukkan Email" name="email"
                            value="{{ $user->email ?? old('email') }}" readonly>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="exampleInputPassword" placeholder="Password" name="password" readonly>
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword"
                            placeholder="Konfirmasi Password" name="password_confirmation" readonly>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('users.index') }}" class="btn btn-primary">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop
