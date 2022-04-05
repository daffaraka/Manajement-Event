@extends('adminlte::page')

@section('title', 'Detail Kegiatan')

@section('content_header')
    <h1>Detail Kegiatan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <p class="alert alert-danger">{{ $err }}</p>
                        @endforeach
                    @endif
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Kegiatan <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="post_title" value="{{ old('post_title') }}" disabled readonly/>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kegiatan <span class="text-danger">*</span></label>
                            <select class="form-control" name="category" disabled readonly/>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kota <span class="text-danger">*</span></label>
                            <select class="form-control" name="category" disabled readonly/>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Provinsi <span class="text-danger">*</span></label>
                            <select class="form-control" name="category" disabled readonly/>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Banner <span class="text-danger">*</span></label>
                            <select class="form-control" name="category" />
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Pelaksanaan <span class="text-danger">*</span></label>
                            <select class="form-control" name="category" />
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Simpan</button>
                            <a class="btn btn-danger" href="{{ route('post.index') }}">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
