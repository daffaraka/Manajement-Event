@extends('adminlte::page')

@section('title', 'Detail Kegiatan')

@section('content_header')
    <h1>Detail Kegiatan</h1>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop

@section('content')
    @if (session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">          

                      <form method="POST" enctype="multipart/form-data">
                             @csrf
                                <div class="form-group">
                                      <label>Nama Kegiatan <span class="text-danger">*</span></label>
                                      <input class="form-control" type="text" name="nama" value="{{ old('nama') }}" maxlength="25" disabled readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal & Waktu Kegiatan  <span class="text-danger">*</span></label>
                                     <input class="form-control" type="datetime-local" placeholder="Masukan Tanggal & Waktu" name="datetime" value="{{ old('datetime') }}" disabled readonly/>
                                </div>

                                <div class="form-group">
                                     <label>Provinsi <span class="text-danger">*</span></label>
                                     <select class="form-control" name="provinsi" value="{{ old('provinsi') }}" disabled readonly/>
                                          <option value="provinsi">Provinsi</option>
                                     </select>
                                </div>
                                         
                                <div class="form-group">
                                      <label>Kota<span class="text-danger">*</span></label>
                                      <select class="form-control" name="kota" value="kota" disabled readonly/>
                                            <option value="kota">Kota</option>
                                     </select>
                                </div>

                               <div class="form-group">
                                     <label>Jenis Pelaksanaan <span class="text-danger">*</span></label>
                                     <input class="form-control" id="huruf" type="text" name="nama" maxlength="25" disabled readonly/>
                               </div>

                               <div class="form-group">
                                    <label>Anggaran <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                         <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                         </div>
                                         <input type="text" class="form-control" id="uang" onkeypress="return isNumber(event)" disabled readonly/>
                                        <div class="input-group-append">
                                             <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div> 
                                        
                                <div class="form-group">
                                    <label>Banner</label>
                                    <input class="form-control" type="file" name="image" value="img"  accept="image/*" disabled readonly/>
                                </div>

                               <div class="form-group">
                                     <label>Target Peserta <span class="text-danger">*</span></label>
                                     <input class="form-control" type="text" name="number" id="orang" maxlength="12" onkeypress="return isNumber(event)" disabled readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Link/Undangan <span class="text-danger">*</span></label>
                                    <input class="form-control" type="url" name="url" id="url" placeholder="https://example.com" pattern="https://.*" size="30" disabled readonly> 
                                </div>

                                <div class="form-group">
                                    <label>Media Promosi <span class="text-danger">*</span></label>
                                    <input class="form-control" type="url" name="url" id="url" pattern="https://.*" size="30" disabled readonly> 
                                </div>

                                <div class="form-group">
                                   <label>Rundown  <span class="text-danger">*</span></label>
                                   <input class="form-control" type="file" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf" disabled readonly/>
                                </div>
                                         
                                <div class="form-group">
                                    <label>Deskripsi Kegiatan</label>
                                    <textarea class="form-control" name="deskripsi" rows="5" disabled readonly></textarea>
                                </div>

                      </form>   
                               
                        <button type="button" class="btn btn-danger"><a class="text-white" href="{{ route('kegiatan.index') }}">Kembali</a> </button>                               
                 
                </div>
            </div>
        </div>
    </div>


 <!-- js -->

 <!-- rp Js -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    //hanya huruf tambah
    function alphaOnly(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[a-zA-Z]/i);
       return pattern.test(value);
    }

    $('#huruf').bind('keypress', alphaOnly);
    //hanya huruf edit
    function alphaOnly(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[a-zA-Z]/i);
       return pattern.test(value);
    }

    $('#huruf2').bind('keypress', alphaOnly);

    //hanya angka
      function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
    }
    
    // uang tambah
    $(function(){
      $("#uang").keyup(function(e){
        $(this).val(format($(this).val()));
      });
    });
    var format = function(num){
      var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
      if(str.indexOf(".") > 0) {
        parts = str.split(".");
        str = parts[0];
      }
      str = str.split("").reverse();
      for(var j = 0, len = str.length; j < len; j++) {
        if(str[j] != ",") {
          output.push(str[j]);
          if(i%3 == 0 && j < (len - 1)) {
            output.push(",");
          }
          i++;
        }
      }
      formatted = output.reverse().join("");
      return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
    };
//uang edit
    $(function(){
      $("#uang2").keyup(function(e){
        $(this).val(format($(this).val()));
      });
    });
    var format = function(num){
      var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
      if(str.indexOf(".") > 0) {
        parts = str.split(".");
        str = parts[0];
      }
      str = str.split("").reverse();
      for(var j = 0, len = str.length; j < len; j++) {
        if(str[j] != ",") {
          output.push(str[j]);
          if(i%3 == 0 && j < (len - 1)) {
            output.push(",");
          }
          i++;
        }
      }
      formatted = output.reverse().join("");
      return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
    };
    //orang
      $(function(){
      $("#orang").keyup(function(e){
        $(this).val(format($(this).val()));
      });
    });
    var format = function(num){
      var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
      if(str.indexOf(".") > 0) {
        parts = str.split(".");
        str = parts[0];
      }
      str = str.split("").reverse();
      for(var j = 0, len = str.length; j < len; j++) {
        if(str[j] != ",") {
          output.push(str[j]);
          if(i%3 == 0 && j < (len - 1)) {
            output.push(",");
          }
          i++;
        }
      }
      formatted = output.reverse().join("");
      return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
    };
</script>

 <!-- flatepicker -->
   <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
   <script>
       config = {
           enableTime: true,
            dateFormat: "Y-m-d H:i",
            altInput: true,
            altFormat: "F j, Y (h:S K)"
        }

       flatpickr("input[type=datetime-local]", config);
   </script>
 
     <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
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

