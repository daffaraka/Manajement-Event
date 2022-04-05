@extends('adminlte::page')

@section('title', 'Daftar Peserta')

@section('content_header')
    <h1>List Peserta</h1>
@stop

@section('content')
     @if (session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                    <!-- Button trigger modal -->
                <a href="javascript:void(0)" class="btn btn-primary my-3" id="tombol-tambah">Tambah Kegiatan</a>
                <br><br>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-stripped d-table dt-responsive nowrap" style="width: 100%" id="peserta">
                        <thead>
                            <tr>
                                <th scope="col">Nama Peserta</th>
                                <th scope="col">Event yang diikuti</th>
                                <th scope="col">Email Peserta</th>
                                <th scope="col">Usia</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Nomor Hp</th>
                                <th scope="col">Kota & Provinsi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Tambah edit modal --}}
    

   
    {{-- Modal Detail --}}
    <div class="modal fade" id="detail-peserta" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="pesertaShowModal"></h4>
                </div>
                <div class="modal-body">
                    {{-- <div class="container"> --}}
                        <input type="hidden" name="id" id="detail_id">
                        {{-- <div class="row"> --}}
                        
                               
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Nama Peserta</label>
                                    <div class="col-sm-12" id="detailBanner">
                                        <input type="text" class="form-control" id="detailNamaPeserta" name="detailNamaPeserta" value="" required="" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Email Peserta</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="detailEmail" name="detailEmail" value="" required="" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Usia</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="detailUsia" name="detailUsia" value="" required="" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="detailJk" name="detailJk" value="" required="" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Nomor HP</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="detailNomorHP" name="detailNomorHP" value="" required="" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Kota</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="detailKota" name="detailKota" value="detailJenisPelaksanaan" required="" disabled>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="name" class="col-sm-5 control-label">Provinsi</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="detailProvinsi" name="detailProvinsi" value="detailTarget" required="" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-5 control-label">Pendidikan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="detailPendidikan" name="detailPendidikan" value="" required="" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Pekerjaan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="detailPekerjaan" name="detailPekerjaan" value="" required="" disabled>
                                    </div>
                                </div>
                              
                            </div>
                            
                        </div>
                    </div>
                        
                </div>
                </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_method" value="DELETE">
                    <p>Kamu yakin ingin menghapus data Kegiatan?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary btn" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger btn" name="tombol-hapus" id="tombol-hapus">Hapus
                        Kegiatan</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
<!-- JAVASCRIPT -->
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $(document).ready(function () {
        $('#peserta').DataTable({
            processing: true,
            serverSide: true, 
            ajax: {
                url: "{{ route('peserta.index') }}",
                type : "GET",
            },
            columns: [
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'kegiatan',
                    name: 'kegiatan.namakegiatan'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'usia',
                    name: 'usia'
                },
                {
                    data: 'jk',
                    name: 'jk'
                },
                {
                    data: 'nomorhp',
                    name: 'nomorhp'
                },
                {
                    "data": null,
                    render: function ( data, type, row, meta )
                    {
                        return row.kota + "," + row.provinsi ;
                    }
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
            order: [
                [0, 'asc']
            ]
        });
    });

    $('body').on('click', '.detail-peserta', function () {
            var data_id = $(this).data('id');
            cache: false,
            $.get('peserta/'+data_id, function(data) {
               
                $('#pesertaShowModal').html("Peserta Details");
                $('#detail-peserta').modal('show');
                $('#id').val(data.id);
                $('#detailNamaPeserta').val(data.name);
                $('#detailEmail').val(data.email);
                $('#detailUsia').val(data.usia);
                $('#detailJk').val(data.jk);
                $('#detailNomorHP').val(data.nomorhp);
                $('#detailKota').val(data.kota);
                $('#detailProvinsi').val(data.provinsi);
                $('#detailPendidikan').val(data.pendidikan);
                $('#detailPekerjaan').val(data.pekerjaan);
            });
        });

</script>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop