@extends('adminlte::page')

@section('title', 'List Pertanyaan')

@section('content_header')
    <h1>List Kegiatan</h1>
@stop

@section('content')
    @if (session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    <div class="card card-default">
        <div class="card-header">
            <form class="form-inline">
                <div class="form-group mr-1">
                    <input class="form-control" type="text" name="q" value="{{ $q }}"
                        placeholder="Pencarian..." />
                </div>
                <div class="form-group mr-1">
                    <button class="btn btn-success">Refresh</button>
                </div>
                <div class="form-group mr-1">
                    <a class="btn btn-primary" href="{{ route('pertanyaan.create') }}">Tambah</a>
                </div>
            </form>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-bordered table-striped table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php $no = 1; ?>
                @foreach ($rows as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->pertanyaan_title }}</td>
                        <td><ol start="1" type="a">
                            <i>
                        <li><input type="radio" name="NO1" value="a">Lorem, ipsum.</li>
                        <li><input type="radio" name="NO1" value="b">Lorem ipsum dolor sit amet.</li>
                        <li><input type="radio" name="NO1" value="c">Lorem, ipsum.</li>
                        <li><input type="radio" name="NO1" value="d">Lorem, ipsum dolor.</li>
                        </i>  
                           </ol></td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{ route('pertanyaan.edit', $row) }}">Edit</a>
                            <form method="POST" action="{{ route('pertanyaan.destroy', $row) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Hapus Data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
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
