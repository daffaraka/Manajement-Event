@extends('adminlte::page')

@section('title', 'List Pengawas')

@section('content_header')
    <h1 class="m-0 text-dark">List Pengawas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{ route('pengawas.create') }}" class="btn btn-primary mb-2">
                        Tambah Pengawas
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>username</th>
                                <th>Email</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengawas as $key => $pengawas)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $pengawas->name }}</td>
                                    <td>{{ $pengawas->username }}</td>
                                    <td>{{ $pengawas->email }}</td>
                                    <td>
                                        <a href="{{ route('pengawas.show', $pengawas) }}" class="btn btn-info btn-xs">
                                            Detail
                                        </a>
                                        <a href="{{ route('pengawas.edit', $pengawas) }}" class="btn btn-primary btn-xs">
                                            Edit
                                        </a>
                                        <a href="{{ route('pengawas.destroy', $pengawas) }}"
                                            onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
