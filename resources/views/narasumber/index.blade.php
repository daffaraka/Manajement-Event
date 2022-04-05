@extends('adminlte::page')

@section('title', 'Management Narasumber')

@section('content_header')
    <h1 class="m-0 text-dark">Management Narasumber</h1>
@stop

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
    integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <!-- Button trigger modal -->
                <a href="javascript:void(0)" class="btn btn-primary my-3" id="tombol-tambah">Tambah Narasumber</a>
                <br><br>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-stripped d-table dt-responsive nowrap" style="width: 100%" id="narasumber">
                        <thead>
                            <tr>
                                <th scope="col">Nama Narasumber</th>
                                <th scope="col">Kategori Narasumber</th>
                                <th scope="col">Kota</th>
                                <th scope="col">Provinsi</th>
                                <th scope="col">No. Hp</th>
                                <th scope="col">Email</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                </div>
                <!-- Table End -->

                <!--Modal Add dan Edit -->
                <div class="modal fade" id="tambah-edit-modal" aria-hidden="true" tabindex="-1">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-judul"></h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal">
                                    <input type="hidden" name="id" id="id">

                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Nama Narasumber</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Narasumber"
                                                value="" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Kategori Narasumber</label>
                                        <div class="col-sm-12">
                                            <select type="text" class="form-control" id="id_kategori_narasumber" name="id_kategori_narasumber" placeholder="Kategori Narasumber"
                                                value="" required>
                                                <option >Pilih Kategori</option>
                                                @foreach ($kategoris as $data)
                                                     <option value="{{$data->id_kategori}}">{{$data->kategori}}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group">
                                        <label>Kategori Narasumber</label>
                                        <select name="kategori" id= "kategori "class="form-control @error('edulevel_id') is-invalid @enderror">
                                            <option value="">- Pilih Kategori -</option>
                                            @foreach ($list_narasumber as $item)
                                                <option value="{{ $item->id }}" {{ old('kategori') == $item->id ? 'selected' : null }}>{{ $item->kategori }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div> --}}
    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Nomor Handphone</label>
                                        <div class="col-sm-12">
                                        <input type="text" name="nomorhp" class="form-control" id="nomorhp"
                                            placeholder="Nomor Handphone" onkeypress="return onlyNumberKey(event)"
                                            maxlength="13" minlenght="11" required>
                                        @error('number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Email</label>
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Narasumber" value=""
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputJeniskelamin">Jenis kelamin</label>
                                        <select class="form-control" name="jk"
                                            value="{{ old('jeniskelamin') }}" id="jk"
                                            placeholeder="Jenis Kelamin" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki=Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <tr>
                                            <td>
                                                <label for="exampleInputName">Pendidikan</label>
                                            </td>
                                            <td><select class="form-control" name="pendidikan" id="pendidikan"
                                                    placeholeder="Pekerjaan" onchange="show()">
                                                    <option value="">Pilih Pendidikan</option>
                                                    <option value="SD">SD / Sederajat</option>
                                                    <option value="SMP">SMP / Sederajat</option>
                                                    <option value="SMA">SMA / Sederajat</option>
                                                    <option value="D1">D1</option>
                                                    <option value="D2">D2</option>
                                                    <option value="D3">D3</option>
                                                    <option value="S1">S1</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                </select>
                                            </td>
                                        </tr>

                                        <div class="validate"></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <tr>
                                            <td>
                                                <label for="exampleInputName">Pekerjaan</label>
                                            </td>
                                            <td><select class="form-control" name="pekerjaan" id="pekerjaan"
                                                    placeholeder="Pekerjaan" onchange="show()">
                                                    <option value="">Pilih Pekerjaan</option>
                                                    <option value="Pelajar">Pelajar</option>
                                                    <option value="Mahasiswa">Mahasiswa</option>
                                                    <option value="ASN/TNI/Polri">ASN/TNI/Polri</option>
                                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                                    <option value="Wirausaha">Wirausaha</option>
                                                    <option value="Freelancer">Freelancer</option>
                                                    <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </td>
                                        </tr>

                                        <div class="validate"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Provinsi</label>
                                        <div class="col-sm-12">
                                            <select name="provinsi" id="provinsi" class="form-control required" data-width="100%">
                                                <option>Pilih Provinsi</option>
                                                @foreach ($provinces as $Provinsi)
                                                    <option value="{{ $Provinsi->id }}">{{ $Provinsi->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Kota</label>
                                        <div class="col-sm-12">
                                            <select name="kota" id="kota" class="form-control required">
                                                <option value=""required>Pilih Kota</option>
                                            </select>
                                        </div>
                                    </div>
                                  
    
                                <div class="col-sm-offset-2 col-sm-12">
                                    <button type="submit" class="btn btn-success btn-block" id="tombol-simpan"
                                        value="create">Simpan
                                    </button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
               

                {{-- Modal Detail --}}
                <div class="modal fade" id="detail-modal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="userShowModal"></h4>
                            </div>
                            <div class="modal-body">
                                    <input type="hidden" name="id" id="detail_id">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Nama</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="detailNama" name="nama" value="" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Kategori</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="detailKategori" name="nama" value="" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-3 control-label">Nomor Hp</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="detailNomorHp" name="nama" value="" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="detailEmail" name="nama" value="" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-5 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="detailJk" name="nama" value="" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-5 control-label">Pendidikan</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="detailPendidikan" name="nama" value="" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-5 control-label">Pekerjaan</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="detailPekerjaan" name="nama" value="" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Kota</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="detailKota" name="nama" value="" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Provinsi</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="detailProvinsi" name="nama" value="" required="" disabled>
                                        </div>
                                    </div>      
                            </div>
                          </div>
                    </div>
                </div>
                <!-- Modal Delete -->
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
                                <p>Kamu yakin ingin menghapus data Narasumber?</p>
                            </div>
                            <div class="modal-footer bg-whitesmoke br">
                                <button type="button" class="btn btn-secondary btn" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-danger btn" name="tombol-hapus" id="tombol-hapus">Hapus
                                    Narasumber</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
    <!-- Akhir Modal -->

    <!--Lib JS -->
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

        //provinsi
        $(function(){
            $('#provinsi').on('change',function(){
                let id_provinsi = $('#provinsi').val();

                $.ajax({
                    type : 'POST',
                    url : "{{ route('getkota') }}",
                    data : {id_provinsi:id_provinsi},
                    cache : false,

                    success:function(msg){
                    $('#kota').html(msg);
                    },
                    error: function(data){
                    console.log('error:',data)
                    },
                });
            });
        })

        //Tombol Add Data
        $('#tombol-tambah').click(function () {
            $('#button-simpan').val("create-post");
            $('#id').val('');
            $('#form-tambah-edit').trigger("reset");
            $('#modal-judul').html("Tambah Narasumber Baru");
            $('#tambah-edit-modal').modal('show');
        });

        //Datatable
        $(document).ready(function () {
            $('#narasumber').DataTable({
                processing: true,
                serverSide: true, 
                ajax: {
                    url: "{{ route('narasumber.index') }}",
                    type: 'GET'
                    },
                columns: [{
                    data: 'nama',
                    name: 'nama'
                    },
                    {
                    data: 'nama_kategori_narasumber',
                    name: 'nama_kategori_narasumber'
                    },
                    {
                    data: 'kota',
                    name: 'kota'
                    },
                    {
                    data: 'provinsi',
                    name: 'provinsi'
                    },
                    {
                    data: 'nomorhp',
                    name: 'nomorhp'
                    },
                    {
                    data: 'email',
                    name: 'email'
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

        //Simpan, Update dan Validasi
        if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({
                submitHandler: function (form) {
                var actionType = $('#tombol-simpan').val();
                $('#tombol-simpan').html('Sending..');

                    $.ajax({
                        data: $('#form-tambah-edit')
                            .serialize(), 
                        url: "{{ route('narasumber.store') }}", 
                        type: "POST", 
                        dataType: 'json', 
                        success: function (data) {  
                            $('#form-tambah-edit').trigger("reset"); 
                            $('#tambah-edit-modal').modal('hide'); 
                            $('#tombol-simpan').html('Simpan');
                            var oTable = $('#narasumber').dataTable();
                            oTable.fnDraw(false);
                            iziToast.success({ 
                            title: 'Data Berhasil Disimpan',
                            message: '{{ Session('
                            success ')}}',
                            position: 'bottomRight'
                            });
                        },
                        error: function (data) { 
                            console.log('Error:', data);
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }

        //Tombol Edit Data
        $('body').on('click', '.edit-post', function () {
            var data_id = $(this).data('id');
            $.get('narasumber/' + data_id + '/edit', function (data) {
                $('#modal-judul').html("Edit Narasumber");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');
    
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#id_kategori_narasumber').val(data.id_kategori_narasumber);
                $('#nomorhp').val(data.nomorhp);
                $('#email').val(data.email);
                $('#jk').val(data.jk);
                $('#pendidikan').val(data.pendidikan);
                $('#pekerjaan').val(data.pekerjaan);
                $('#kota').val(data.kota);
                $('#provinsi').val(data.provinsi);
            })
        });
        
        //Detail data
        $('body').on('click', '.detail-narasumber', function () {
            var data_id = $(this).data('id');
            $.get('narasumber/'+data_id, function(data) {
                $('#userShowModal').html("User Details");
                $('#detail-modal').modal('show');
                
                $('#detail_id').val(data.id);
                $('#detailNama').val(data.nama);
                $('#detailKategori').val(data.nama_kategori_narasumber);
                $('#detailNomorHp').val(data.nomorhp);
                $('#detailEmail').val(data.email);
                $('#detailJk').val(data.jk);
                $('#detailPendidikan').val(data.pendidikan);
                $('#detailPekerjaan').val(data.pekerjaan);
                $('#detailKota').val(data.kota);
                $('#detailProvinsi').val(data.provinsi);
            });
        });

       

        //modal delete
        $(document).on('click', '.delete-data', function () {
            dataId = $(this).attr('id');
            $('#konfirmasi-modal').modal('show');
            });

        //jika tombol hapus di klik
        $('#tombol-hapus').click(function () {
            $.ajax({
                url: "narasumber/" + dataId,
                type: 'delete',
                beforeSend: function () {
                    $('#tombol-hapus').text('Hapus Data'); 
                    },
                success: function (data) { 
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal('hide'); 
                        var oTable = $('#narasumber').dataTable();
                        oTable.fnDraw(false);
                    });
                    iziToast.warning({
                        title: 'Data Berhasil Dihapus',
                        message: '{{ Session('
                        delete ')}}',
                        position: 'bottomRight'
                    });
                }
            })
        });        
    </script>
    <!-- END JAVASCRIPT -->
@endsection