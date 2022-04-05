@extends('adminlte::page')

@section('title', 'Detail Pengawas')

@section('content_header')
    <h1 class="m-0 text-dark">Detail Pengawas</h1>
@stop

@section('content')
    <form action="{{ route('pengawas.show', $pengawas) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputName">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName"
                                placeholder="Nama lengkap" name="name" value="{{ $pengawas->name ?? old('name') }}" disabled muted>
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Usernama</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="exampleInputUsername"
                                placeholder="Nama lengkap" name="username" value="{{ $pengawas->username ?? old('username') }}" disabled muted>
                            @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputKota">Kota</label>
                            <input type="kota" class="form-control @error('kota') is-invalid @enderror"
                            id="exampleInputKota" placeholder="Kota" name="kota" value="{{ $pengawas->kota ?? old('kota') }}" disabled muted>
                            @error('kota') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputProvinsi">Provinsi</label>
                            <input type="provinsi" class="form-control @error('provinsi') is-invalid @enderror"
                            id="exampleInputProvinsi" placeholder="Provinsi" name="provinsi" value="{{ $pengawas->provinsi ?? old('provinsi') }}" disabled muted>
                            @error('provinsi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputJeniskelamin">Jenis kelamin</label>
                            <select class="form-control" name="kelamin" value="{{ $pengawas->jeniskelamin ?? old('jeniskelamin') }}" id="kelamin" placeholeder="Jenis Kelamin" disabled muted>
                                <option value="" muted>-- Jenis Kelamin --</option>
                                <option value="1">Laki-Laki</option>
                                <option value="2">Perempuan</option>                            
                            </select>
                            @error('jeniskelamin') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="exampleInputEmail" placeholder="Masukkan Email" name="email"
                                value="{{ $pengawas->email ?? old('email') }}" disabled muted>
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNomorhp">Nomor HP</label>
                            <input type="number" class="form-control @error('nomorhp') is-invalid @enderror"
                            id="exampleInputNomorhp" placeholder="Nomorhp" name="nomorhp" value="{{ $pengawas->nomorhp ?? old('nomorhp') }}" disabled muted>
                            @error('nomorhp') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="exampleInputPassword" placeholder="Password" name="password" value="{{ $pengawas->password ?? old('password') }}" disabled muted>
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword"
                                placeholder="Konfirmasi Password" name="password_confirmation" value="{{ $pengawas->password ?? old('password') }}" disabled muted>
                        </div>

                    </div>

                </div>
            </div>
        </div>
@stop
