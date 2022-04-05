@extends('adminlte::page')

@section('title', 'Tambah Pertanyaan')

@section('content_header')
    <h1>Tambah Pertanyaan</h1>
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
                    <form action="{{ route('pertanyaan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Pertanyaan <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="pertanyaan_title" value="{{ old('pertanyaan_title') }}" />
                        </div>
                        <div class="form-group">
                            <label>Jawaban <span class="text-danger">*</span></label>
                            <select class="form-control" name="jawaban" />
                            @foreach ($jawabans as $jawaban)
                                @if ($jawaban == old('jawaban'))
                                    <option value="{{ $jawaban }}" selected>{{ $jawaban }}</option>
                                @else
                                    <option value="{{ $jawaban }}">{{ $jawaban }}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Isi</label>
                            <textarea class="form-control" name="content" rows="10">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Simpan</button>
                            <a class="btn btn-danger" href="{{ route('pertanyaan.index') }}">Kembali</a>
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
