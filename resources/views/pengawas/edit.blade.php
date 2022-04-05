@extends('adminlte::page')

@section('title', 'Edit Pengawas')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Pengawas</h1>
@stop

@section('content')
    <form action="{{ route('pengawas.update', $pengawas) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputName">Nama Pengawas</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName"
                                placeholder="Nama lengkap" name="name" value="{{ $pengawas->name ?? old('name') }}">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUserame">Username</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputUsername"
                                placeholder="Nama lengkap" name="username" value="{{ $pengawas->username ?? old('username') }}">
                            @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputKota">Kota</label>
                            <input type="kota" class="form-control @error('kota') is-invalid @enderror"
                            id="exampleInputKota" placeholder="Kota" name="kota" value="{{ $pengawas->kota ?? old('kota') }}">
                            @error('kota') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputProvinsi">Provinsi</label>
                            <input type="provinsi" class="form-control @error('provinsi') is-invalid @enderror"
                            id="exampleInputProvinsi" placeholder="Provinsi" name="provinsi" value="{{ $pengawas->provinsi ?? old('provinsi') }}">
                            @error('provinsi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputJeniskelamin">Jenis kelamin</label>
                            <select class="form-control" name="kelamin" value="{{ $pengawas->jeniskelamin ?? old('jeniskelamin') }}" id="kelamin" placeholeder="Jenis Kelamin" required>
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
                                value="{{ $pengawas->email ?? old('email') }}">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputNomor">Nomor HP</label>
                            <input type="number" class="form-control @error('nomorhp') is-invalid @enderror"
                            id="exampleInputNomorhp" placeholder="Nomor hp" name="nomorhp" value="{{ $pengawas->nomorhp ?? old('nomorhp') }}">
                            @error('nomorhp') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="exampleInputPassword" placeholder="Password" name="password" value="{{ $pengawas->password ?? old('password') }}">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword"
                                placeholder="Konfirmasi Password" name="password_confirmation" value="{{ $pengawas->password ?? old('password') }}">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('pengawas.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop
