@extends('layouts.main')

@section('hero')
    <!-- ======= Hero Section ======= -->

    <div class="container p-0" style="margin-top:250px">

        <div class="row">

            <div class="col-md-12 p-0">
                <div class="card mb-5 bg-light mt-2 mx-5 border-0 text-black"
                    style="background-color: transparent; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.295);">
                    <h1 class="text-center badge-dark rounded ">{{$detailKegiatan->namakegiatan}}</h1>

                    <img src="{{asset('files/'.$detailKegiatan->banner)}}" class="card-img-top" alt="">
                    <div class="card-body">
                        <table class="table table-secondary rounded">
                            <tbody>
                                <tr>
                                    <td class="w-25 font-weight-bold">Nama Kegiatan </td>
                                    <td>{{$detailKegiatan->namakegiatan}}</td>
                                </tr>
                                <tr>
                                    <td class="w-25 font-weight-bold">Lokasi Kegiatan </td>
                                    <td>{{$detailKegiatan->kota}},{{$detailKegiatan->provinsi}}</td>
                                </tr>
                                <tr>
                                    <td class="w-25 font-weight-bold">Waktu Kegiatan </td>
                                    <td>{{ \Carbon\Carbon::parse($detailKegiatan->waktu)->format('l, d/M/Y, h-i-s')}}</td>
                                </tr>
                                <tr>
                                    <td class="w-25 font-weight-bold">Jenis Kegiatan </td>
                                    <td>{{$detailKegiatan->jenis}}</td>
                                </tr>
                                <tr>
                                    <td class="w-25 font-weight-bold">Deskripsi Kegiatan </td>
                                    <td>{{$detailKegiatan->deskripsi}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="/" class="btn btn-lg btn-outline-primary float-right ml-2">Kembali</a>
                       
                        @if (\Carbon\Carbon::parse($detailKegiatan->waktu)->lt($dateNow))
                            <a href="#" class="btn btn-lg btn-danger float-right" id="terlambat">Daftar</a>

                        @else
                            <a href="{{route('pendaftaranEvent',$detailKegiatan->id_kegiatan)}}" class="btn btn-lg btn-success float-right">Daftar</a>
                        @endif
                    </div>
    
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('#terlambat').click(function (e) { 
            e.preventDefault();
            Swal.fire({
                    icon : 'error',
                    title : 'Yahh kegiatan sudah berakhir :(',
                    html : 'Silahkan mendaftar kegiatan lainnya di website kami '
            })
        });
    </script>
    
    <!-- End Hero -->

    {{-- Service Section --}}


    <!-- End Services Section -->

    <!-- Pembicara Section -->

 

    {{-- end section Pembicara --}}

    {{-- section kegiatan --}}

  

    {{-- end section kegiatan --}}
@endsection
