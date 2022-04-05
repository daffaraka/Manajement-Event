@extends('adminlte::page')

@section('title', 'Management Kegiatan')

@section('content_header')
    <h1>Management Kegiatan</h1>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('content')
    
    <div class="row">
        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                        <!-- Button trigger modal -->
                    <a href="javascript:void(0)" class="btn btn-primary my-3" id="tombol-tambah">Tambah Kegiatan</a>
                    <br><br>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-stripped d-table dt-responsive nowrap" style="width: 100%" id="kegiatan">
                            <thead>
                                <tr>
                                    <th scope="col">Banner kegiatan</th>
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Tanggal & Waktu Kegiatan</th>
                                    <th scope="col">Kota</th>
                                    <th scope="col">Provinsi</th>
                                    <th scope="col">Deskripsi Kegiatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Tambah edit modal --}}
        <div class="modal fade" id="tambah-edit-modal" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-judul"></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="form-tambah-edit" name="form-tambah-edit" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                    <input type="hidden" name="id_kegiatan" id="id">
                                    {{-- <input type="hidden" name="post_banner" id="post_banner"> --}}
    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Banner Kegiatan</label>
                                        <div class="col-sm-12" id="tesBanner">
                                        </div>
                                        <input type="file" class="form-control" accept="image/*" id="banner" name="banner">
                                    </div>
    
                                    <div class="alert alert-danger mt-2 d-none text-danger" id = "err_file">
                                    </div>
    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Nama Kegiatan</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="namakegiatan" name="namakegiatan" placeholder="Nama Kegiatan"
                                                value="" required>
                                        </div>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Tanggal & Waktu Kegiatan</label>
                                        <div class="col-sm-12">
                                            <input type="datetime-local" class="form-control" id="waktu" name="waktu" placeholder="Masukan Tanggal & Waktu"
                                                value="" required>
                                        </div>
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
    
                                    <div class="form-group">
                                        <label for="exampleInputJeniskelamin">Jenis Pelaksanaan</label>
                                        <select class="form-control" name="jenis"
                                            value="{{ old('jenispelaksanaan') }}" id="jenis"
                                            placeholeder="Jenis Pelaksanaan" required>
                                            <option value="">Pilih Jenis Pelaksanaan</option>
                                            <option value="Daring">Daring</option>
                                            <option value="Luring">Luring</option>
                                        </select>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Target Peserta</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="target" name="target" placeholder="Target Peserta"
                                                value="" required>
                                        </div>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Link/Undangan</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="undangan" name="undangan" placeholder="Link/Undangan"
                                                value="" required>
                                        </div>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Deskripsi Kegiatan</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Kegiatan"
                                                value="" required>
                                        </div>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Anggaran Diterima</label>
                                        <div class="col-sm-12">
                                            <input id="anggaran" class="CurrencyInput form-control" name="anggaran" placeholder="Anggaran Diterima" value=""  required>
                                        </div>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Rundown</label>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control" id="rundown" name="rundown" placeholder="Rundown"
                                                value="" required>
                                        </div>
                                    </div>

    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Media Promosi</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="mediapromosi" name="mediapromosi" placeholder="Media Promosi"
                                                value="" required>
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

        {{-- Detail modal --}}
                        {{-- Modal Detail --}}
                        <div class="modal fade" id="detail-kegiatan" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="kegiatanShowModal"></h4>
                                    </div>
                                    <div class="modal-body">
                                        {{-- <div class="container"> --}}
                                            <input type="hidden" name="id" id="detail_id">
                                            {{-- <div class="row"> --}}
                                            
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Banner</label>
                                                        <div class="col-sm-12" id="detailBanner">
                                                            
                                                        </div>
                                                    </div>
                                               
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Nama Kegiatan</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailNamaKegiatan" name="detailNamaKegiatan" value="" required="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Tanggal & Waktu Kegiatan</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailWaktu" name="detailWaktu" value="" required="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-3 control-label">Provinsi</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailProvinsi" name="detailProvinsi" value="" required="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Kota</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailKota" name="detailKota" value="" required="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Jenis Pelaksanaan</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailJenisPelaksanaan" name="detailJenisPelaksanaan" value="detailJenisPelaksanaan" required="" disabled>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-5 control-label">Target Peserta</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailTarget" name="detailTarget" value="detailTarget" required="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-5 control-label">Link/Undangan</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailUndangan" name="detailUndangan" value="" required="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Deskripsi</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailDeskripsi" name="detailDeskripsi" value="" required="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Anggaran</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailAnggaran" name="detailAnggaran" value="" required="" disabled>
                                                        </div>
                                                    </div>      
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Rundown</label>
                                                        <div class="col-sm-12" >
                                                            <div class="form-control h-auto" id="detailRundown">

                                                            </div>
                                                        </div>
                                                    </div>      
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Media Promosi</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailMediaPromosi" name="detailMediaPromosi" disabled value="">
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

    <!-- Table End -->

     
    <!-- Akhir Modal -->

    <!-- Modal Delete -->
   
    <!-- Akhir Modal -->

    <!--Lib JS -->
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.min.js" integrity="sha512-YKERjYviLQ2Pog20KZaG/TXt9OO0Xm5HE1m/OkAEBaKMcIbTH1AwHB4//r58kaUDh5b1BWwOZlnIeo0vOl1SEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.js" integrity="sha512-7MUzENx3yOdqefYPoJoASx3omUka8w1QguEY+Yl2QDKwGAQIHqjfh4nGiEq5Hxx1WYR7NDGRxGaYVbLHLyhh4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
<!-- JAVASCRIPT -->
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

  

    
    $(function(){
        $('#provinsi').on('change',function(){
            let id_provinsi = $('#provinsi').val();

            //console.log(id_provinsi);
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
        $('#modal-judul').html("Tambah Kegiatan Baru");
        $('#tambah-edit-modal').modal('show');
    });

    // Konversi input koma
    $('input.CurrencyInput').on('keyup', function() {
        
        const value = this.value.replace(/,/g, '');
        this.value = parseFloat(value|0).toLocaleString('en-US', {
            style: 'decimal',
            maximumFractionDigits: 2,
            minimumFractionDigits: 0,
        });
        
    });

    


    //Datatable
    $(document).ready(function () {
        $('#kegiatan').DataTable({
            processing: true,
            serverSide: true, 
            ajax: {
                url: "{{ route('kegiatan.index') }}",
                type: 'GET'
            },
            columns: [
                {
                    data : 'banner',render:function(data,type,row,meta) {
                        return '<img src="files/'+ data +'" style="max-height:150px; max-width:150px;" class="m-3 mx-auto d-block" />';
                    },
                    name : 'banner',
                },
                {
                    data: 'namakegiatan',
                    name: 'namakegiatan'
                },
                {
                    data: 'waktu',
                    name: 'waktu'
                   
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
                    data: 'deskripsi',
                    name: 'deskripsi'
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

     // var files = $('#banner')[0].files;

            // if(files.length > 0){
            // var banner_image = new FormData();

            // // Append data 
            // banner_image.append('file',files[0]);
            // banner_image.append('_token',CSRF_TOKEN);
            // }


    //Simpan, Update dan Validasi
    if ($("#form-tambah-edit").length > 0) {
        $("#form-tambah-edit").validate({
            submitHandler: function (form) {
                
                var fileUpload = $("#banner").get();
                var files = fileUpload.file;
                var image = new FormData(this);

                var actionType = $('#tombol-simpan').val();

                $('#tombol-simpan').html('Sending..');
                
                $.ajax({
                    data: $('#form-tambah-edit')
                        .serialize(),
                    url: "{{ route('kegiatan.store') }}", 
                    type: "POST", 
                    contentType: false,
                    processData: true,
                    success: function (data) {  
                        $('#form-tambah-edit').trigger("reset"); 
                        $('#tambah-edit-modal').modal('hide'); 
                        $('#tombol-simpan').html('Simpan');
                        var oTable = $('#kegiatan').dataTable();
                        oTable.fnDraw(false);
                        iziToast.success({ 
                            title: 'Data Berhasil Disimpan',
                            message: '{{ Session('success')}}',
                            position: 'bottomRight'
                        });
                    },
                    error: function (data) { 
                        console.log('Error:', data);
                        $('#tombol-simpan').html('Simpan');
                    }
                });
            }
        });
    }
    

    //Detail kegiatan
    $('body').on('click', '.detail-kegiatan', function () {
            var data_id = $(this).data('id');
            cache: false,
            $.get('kegiatan/'+data_id, function(data) { 
                $('#kegiatanShowModal').html("Kegiatan Details");
                $('#detail-kegiatan').modal('show');
                $('#id').val(data.id_kegiatan);
                $('#detailBanner').html('<img src="files/'+ data.banner +'" class="img-thumbnail mx-auto d-block" style="max-width:200px;" />');
                $('#detailNamaKegiatan').val(data.namakegiatan);
                $('#detailWaktu').val(data.waktu);
                $('#detailProvinsi').val(data.provinsi);
                $('#detailKota').val(data.kota);
                $('#detailJenisPelaksanaan').val(data.jenis);
                $('#detailTarget').val(data.target);
                $('#detailUndangan').val(data.undangan);
                $('#detailDeskripsi').val(data.deskripsi);
                $('#detailRundown').html('<a href="rundown/'+ data.rundown +'" > '+data.rundown+' </a>');
                $('#detailMediaPromosi').val(data.mediapromosi);
                $('#detailAnggaran').val("Rp " + data.anggaran.toLocaleString("id") + ",00");
            });
        });


    //Tombol Edit Data
    $('body').on('click', '.edit-post', function () {
        var data_id = $(this).data('id');
        $.get('kegiatan/' + data_id + '/edit', function (data) {
            $('#modal-judul').html("Edit Kegiatan");
            $('#tombol-simpan').val("edit-post");
            $('#tambah-edit-modal').modal('show');

            $('#id').val(data.id_kegiatan);
            $('#tesBanner').html('<img src="files/'+ data.banner +'" class="img-thumbnail mx-auto d-block" />');
            $('#namakegiatan').val(data.namakegiatan);
            $('#kota').val(data.kota);
            $('#provinsi').val(data.provinsi);
            $('#waktu').val(data.waktu);
            $('#jenis').val(data.jenis);
            $('#target').val(data.target);
            $('#undangan').val(data.undangan);
            $('#deskripsi').val(data.deskripsi);
            $('.CurrencyInput').val(data.anggaran);
            $('#mediapromosi').val(data.mediapromosi);
            $('#rundown').val(data.rundown);
           
        })
    });

    // Update Data
    

    //modal delete
    $(document).on('click', '.delete', function () {
    dataId = $(this).attr('id');
    $('#konfirmasi-modal').modal('show');
    });

    //jika tombol hapus di klik
    $('#tombol-hapus').click(function () {
        $.ajax({
            url: "kegiatan/" + dataId + "/delete",
            type: 'get',
            beforeSend: function () {
                $('#tombol-hapus').text('Hapus Data'); 
            },
            success: function (data) { 
                setTimeout(function () {
                    $('#konfirmasi-modal').modal('hide'); 
                    var oTable = $('#kegiatan').dataTable();
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
<!-- JAVASCRIPT -->
@endsection