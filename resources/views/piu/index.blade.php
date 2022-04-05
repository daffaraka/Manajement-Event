@extends('adminlte::page')

@section('title', 'Management PIU')

@section('content_header')
    <h1 class="m-0 text-dark">Management PIU</h1>
@stop

@section('content')
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary my-1" data-toggle="modal" data-target="#exampleModal">
                            Tambah PIU
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah PIU</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="exampleInputName">Nama PIU</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="exampleInputName" placeholder="Nama PIU" name="name"
                                                value="{{ old('name') }}" onkeypress="return /[a-z]/i.test(event.key)">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputName">No Telephone</label>
                                            <input type="text" name="notel" class="form-control" id="notel"
                                                placeholder="No. Telephone" onkeypress="return onlyNumberKey(event)"
                                                maxlength="14" minlenght="11" required>
                                            @error('number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail">Email address</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="exampleInputEmail" placeholder="Masukkan Email" name="email"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword">Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword">Konfirmasi Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword"
                                                placeholder="Konfirmasi Password" name="password_confirmation">
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        <a href="/piu" class="btn btn-danger">
                                            Batal
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal -->

                        <!-- Modal Edit -->
                        <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit PIU</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="exampleInputName">Nama PIU</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="exampleInputName" placeholder="Nama PIU" name="name"
                                                value="{{ old('name') }}" onkeypress="return /[a-z]/i.test(event.key)">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputName">No Telephone</label>
                                            <input type="text" name="notel" class="form-control" id="notel"
                                                placeholder="No. Telephone" onkeypress="return onlyNumberKey(event)"
                                                maxlength="14" minlenght="11" required>
                                            @error('number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail">Email address</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="exampleInputEmail" placeholder="Masukkan Email" name="email"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword">Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword">Konfirmasi Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword"
                                                placeholder="Konfirmasi Password" name="password_confirmation">
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        <a href="/piu" class="btn btn-danger">
                                            Batal
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal -->

                        <table class="table table-hover table-bordered table-stripped" id="example2">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Modal Delete-->
                                <form method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Management PIU
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin akan menghapus data ?</p>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                    <a href="/piu" class="btn btn-success">
                                                        Batal
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal -->

                                    <tr>
                                        <td>1.</td>
                                        <td>Example</td>
                                        <td>example@gmail.com</td>
                                        <td>
                                            <a href="/piu/edit" class="btn bg-gradient-olive btn-xs" data-toggle="modal"
                                                data-target="#exampleModalEdit">
                                                Edit
                                            </a>
                                            <a href="/piu/show" class="btn btn-info btn-xs">
                                                Detail
                                            </a>
                                            <a href="/piu" onclick="notificationBeforeDelete(event, this)"
                                                class="btn btn-danger btn-xs" data-toggle="modal"
                                                data-target="#exampleModalDelete">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

        </div>
    </form>

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
