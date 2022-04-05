@extends('layouts.main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('hero')
    <!-- ======= Hero Section ======= -->

    <section id="hero">
        <div class="layer">
            <div class="hero-container" data-aos="fade-up">
                <h1 class="text-oswald">Management Event</h1>

                @auth
                    <h2>Manage Your Events!!</h2>
                @else
                    <h2>Find Your Events!!</h2>
                @endauth

                <a href="#search" class="btn-get-started scrollto"><i class="bx bx-chevrons-down"></i></a>
            </div>
        </div>
    </section>

    <!-- End Hero -->

    {{-- List Event card Besar Section --}}

    <section id="search" class="services">

        {{-- Search Bar --}}
        <div class="container bg-secondary text-light p-3 rounded">
            <h2 class="text-center mb-4">Search</h2>
            <form method="get" action="{{route('search')}}" div class="row">
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="query" value="{{ isset($searchterm) ? $searchterm : ''  }}" placeholder="Masukkan nama kegiatan">
                </div>
                {{-- <div class="col-lg-3">
                    <select name="provinsi" id="provinsi" class="form-control required" data-width="100%">
                        <option>Pilih Provinsi</option>
                        @foreach ($provinces as $Provinsi)
                            <option value="{{ $Provinsi->id }}">{{ $Provinsi->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2">
                    <select class="form-control"name="kota" id="kota">
                        <option value="">Pilih Kota</option>
                    </select>
                </div>
                <div class="col-lg-2">
                    <input type="date" class="form-control" name="waktu">
                    </input>
                </div> --}}
                <div class="col-lg-2">
                   <button type="submit" class="btn btn-primary">Pencarian</button>
                </div>
            </form>
        </div>

        

        {{-- <div class="row justify-content-center mx-auto w-100">

            <div class="col-md-6">

                <div class="input-group mb-5">

                    <input type="text" class="form-control" placeholder="Search.." name="search">

                    <button class="btn btn-primary" type="sumbit">Search</button>

                </div>

            </div>

            

        </div> --}}

        {{-- Event --}}
        {{-- End --}}
       

    </section>
     
    <section id="services">
        <div class="container p-0">
    

            
            <div class="row">

                
          
                @if ($kegiatan == null)

                   
                    <div class="col-lg-12 text-center">
                        <h1 class="mb-1 ml-5">Tidak ada event terbaru</h1>
                    </div>
                  

                @else
                    <div class="col-md-7 p-0">
                        <h2 class="mb-1 ml-5">Event Terbaru</h2>
                        <div class="card mb-3 bg-light mt-2 mx-5 border-0 text-black"
                            style="background-color: transparent; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.295);">
                            <img src="{{asset('files/'.$kegiatan->banner)}}" class="card-img-top" style="max-height: 358px" alt="">
                            <div class="card-body">
                                <ul style="list-style: none; margin: 0; padding: 0;">
                                    <li>
                                        <small class="text-start">
                                            <ul style="list-style: none;">
                                                <li>

                                                    <h4 class="text-info">{{$kegiatan->namakegiatan}}</h4>
                                                </li>
                                                <li>
                                                    <h6><i class="icofont-location-pin"></i> {{$kegiatan->kota}}, {{$kegiatan->provinsi}}</h6>
            
                                                    <h5><i class="icofont-calendar"></i> {{ \Carbon\Carbon::parse($kegiatan->waktu)->format('l, d/M/Y, h-i-s')}}</h5>
                                                </li>
                                                <li>
                                                    <h6><i class="icofont-globe"></i> {{$kegiatan->jenis}}</h6>
            
                                                </li>
                                            </ul>
                                        </small>
                                        <div class="text-center">
                                            <a href="{{route('detailKegiatan.show',$kegiatan->id_kegiatan)}}" class="text-decoration-none btn btn-primary detail-more">See More</a>
                                        </div>
                                    </li>
                                </ul>
            
                            </div>
            
                        </div>
                    </div>
                @endif
                {{-- Event Lainnya --}}

                @if($kegiatanLain->count()==0)
                        {{-- Blank --}}
                @else

                <div class="col-md-5 p-0">
                    <h2 class="mb-2">Event Lainnya</h2>
                        <div class="container p-0">
                            <div class="card p-2">
                                <div class="row">
                                    @foreach ($kegiatanLain as $item)

                                        @if (\Carbon\Carbon::parse($item->waktu)->lt($dateNow))
                                            <div class="col-md-12 ">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 mb-2">
                                                        <img src="{{asset('files/'.$item->banner)}}" class="rounded shadow mx-auto d-block" style="max-height:150px; max-width:150px;;" alt="">
                                                    </div>
                                                    <div class="col-lg-8 col-md-6 mb-2">
                                                        <h5 class="card-title">{{$item->namakegiatan}}</h5>
                                                        <p class="card-text mb-0">
                                                            <i class="icofont-clock-time"></i> {{ \Carbon\Carbon::parse($item->waktu)->format('l, d/M/Y, h-i-s')}}<br>
                                                        <i class="icofont-globe"></i> {{$item->jenis}}<br>
                                                        <i class="icofont-location-pin"></i> {{$item->kota}}, {{$item->provinsi}} <br>
                                                        </p>
                                                        <p class="btn btn-danger disabled m-0" >Event berakhir</p>
                                                        <a href="{{route('detailKegiatan.show',$item->id_kegiatan)}}" class="text-decoration-none btn btn-primary detail-more">See More</a>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                           
                                        @else
                                            <div class="col-lg-4 col-md-6 mb-2">
                                                <img src="{{asset('files/'.$item->banner)}}" class="rounded shadow mx-auto d-block" style="max-height:150px;" alt="">
                                            </div>
                                            <div class="col-lg-8 col-md-6 mb-2">
                                                <h5 class="card-title">{{$item->namakegiatan}}</h5>
                                                <p class="card-text mb-0">
                                                    <i class="icofont-clock-time"></i> {{ \Carbon\Carbon::parse($item->waktu)->format('l, d/M/Y, h-i-s')}}<br>
                                                <i class="icofont-globe"></i> {{$item->jenis}}<br>
                                                <i class="icofont-location-pin"></i> {{$item->kota}}, {{$item->provinsi}} <br>
                                                </p>
                                                <a href="{{route('detailKegiatan.show',$item->id_kegiatan)}}" class="text-decoration-none btn btn-primary detail-more">See More</a>
                                            </div>
                                            
                                        @endif
                                      
                                  
                                    <hr>
                                    @endforeach
                                
                                    {{-- <div class="col-lg-4 mb-3">
                                        <img src="https://source.unsplash.com/featured/200x200?" class="rounded shadow" style="max-height: 150px" alt="">
                                    </div>
                                    <div class="col-lg-8 mb-3">
                                        <h5 class="card-title">Judul Event</h5>
                                        <p class="card-text">
                                            <i class="icofont-clock-time"></i> Waktu Pelaksanaan <br>
                                        <i class="icofont-globe"></i> Jenis Pelaksanaan <br>
                                        <i class="icofont-location-pin"></i> Tempat Pelaksanaan <br>
                                        </p>
                                    </div>
                                    <hr>
                                    <div class="col-lg-4 mb-2">
                                        <img src="https://source.unsplash.com/featured/200x200?" class="rounded shadow" style="max-height: 150px" alt="">
                                    </div>
                                    <div class="col-lg-8 mb-2">
                                        <h5 class="card-title">Judul Event</h5>
                                        <p class="card-text">
                                            <i class="icofont-clock-time"></i> Waktu Pelaksanaan <br>
                                        <i class="icofont-globe"></i> Jenis Pelaksanaan <br>
                                        <i class="icofont-location-pin"></i> Tempat Pelaksanaan <br>
                                        </p>
                                    </div>
                                    <hr> --}}
                                    
                                    
                                </div>
                            </div>
                        </div>
                </div>
                @endif
        
                   
            </div>
           

        </div>
    </section>

    <section id="daftarkota" class="daftarkota">
        
    </section>

    <!-- End Event card Besar Section -->

    <!-- List Event Card Kecil Section -->

    <section id="listevent" class="peta">
        <div class="container">
            <div class="section-title">

                <h2>Daftar Kegiatan Lainnya</h2>

                {{-- <p>Backpacker Teaching awalnya sebuah komunitas ( atau bisa disebut organisasi non-formal ). awalnya berdiri dari sebuah tugas mata kuliah yang ditugaskan membuat vidio pembelajaran dan dari tugas itu hanya 15 mahasiswa kelas BSD yang bersedia mengerjakannya.</p> --}}

            </div>
            <div class="row">
                @foreach ($listKegiatan as $DaftarKegiatan)
                    @if (\Carbon\Carbon::parse($DaftarKegiatan->waktu)->lt($dateNow))
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-4">
                            <div class="card" style="width: 23rem;">
                                <img src="{{asset('files/'.$DaftarKegiatan->banner)}}" class="card-img-top" height="140px" alt="">
                                <div class="card-body">
                                    <ul style="list-style: none; margin: 0; padding: 0;">
                                        <li>
                                            <h6 class="text-info">{{$DaftarKegiatan->namakegiatan}}</h6>
                                        </li>
                                        <li>
                                            <h6><i class="icofont-calendar"></i> {{$DaftarKegiatan->waktu}}<i
                                                    class="icofont-wall-clock"></i> - Selesai</h6>
                                        </li>
                                        <li>
                                            <h6><i class="icofont-location-pin"></i> {{$DaftarKegiatan->kota}},{{$DaftarKegiatan->provinsi}}</h6>
                                        </li>
                                        <li>
                                            <h6><i class="icofont-globe"></i> {{$DaftarKegiatan->jenis}}</h6>
                                        </li>
                                    </ul>
                                    <button class="btn btn-sm btn-danger disabled m-0" >Event berakhir</button>
                                    <a href="{{route('detailKegiatan.show',$DaftarKegiatan->id_kegiatan)}}" class="btn btn-sm btn-primary">See More</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-4">
                            <div class="card" style="width: 23rem;">
                                <img src="{{asset('files/'.$DaftarKegiatan->banner)}}" class="card-img-top" height="140px" alt="">
                                <div class="card-body">
                                    <ul style="list-style: none; margin: 0; padding: 0;">
                                        <li>
                                            <h6 class="text-info">{{$DaftarKegiatan->namakegiatan}}</h6>
                                        </li>
                                        <li>
                                            <h6><i class="icofont-calendar"></i> {{$DaftarKegiatan->waktu}}<i
                                                    class="icofont-wall-clock"></i> - Selesai</h6>
                                        </li>
                                        <li>
                                            <h6><i class="icofont-location-pin"></i> {{$DaftarKegiatan->kota}},{{$DaftarKegiatan->provinsi}}</h6>
                                        </li>
                                        <li>
                                            <h6><i class="icofont-globe"></i> {{$DaftarKegiatan->jenis}}</h6>
                                        </li>
                                    </ul>
                                    <a href="{{route('detailKegiatan.show',$DaftarKegiatan->id_kegiatan)}}" class="btn btn-sm btn-primary">See More</a>
                                </div>
                            </div>
                        </div>
                    @endif
                
                @endforeach


            </div>

        </div>

    </section>

    {{-- Detail edit --}}
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
                                    <label for="name" class="col-sm-12 control-label">Media</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="detailMediaPromosi" name="detailMediaPromosi" value="" required="" disabled>
                                    </div>
                                </div>      
                            </div>
                         
                        </div>
                    </div>
                      
                </div>
              </div>
        </div>
    </div>

    {{-- section kontak --}}
    <!-- ======= Contact Section ======= -->

    {{-- <section id="contact">

        <div class="container text-dark">

            <div class="section-title" data-aos="fade-in" data-aos-delay="100">

                <h2>Kontak Kami</h2>

                <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->

            </div>



            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-6">

                    <div class="info-box mb-4">

                        <img src="assets/asset/Untitled-4-01.png" height="40px" width="52px">

                        <h3>Alamat Kami</h3>
                        <p>Jalan Bukit Sikumbang, Kelurahan Kecamatan No.103, Rangkapan Jaya Baru, Kec. Pancoran Mas,
                            Kota
                            Depok, Jawa Barat 16433</p>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6">

                    <div class="info-box  mb-4">

                        <img src="assets/asset/Untitled-4-02.png" height="40px" width="52px">

                        <h3>Email</h3>





                        <p>example@gmail.com</p>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6">

                    <div class="info-box  mb-4">

                        <img src="assets/asset/Untitled-4-03.png" height="40px" width="52px">

                        <h3>Kontak</h3>

                    </div>

                </div>



            </div>



            <div class="row" data-aos="fade-up" data-aos-delay="200">



                <div class="col-lg-6 ">

                    <iframe class="mb-4 mb-lg-0"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.978034873468!2d106.77396595071701!3d-6.3968319643235665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e966f00b8b2b%3A0x468862342db39278!2sSMP%20%26%20SMK%20ATLANTIS%20PLUS!5e0!3m2!1sid!2sid!4v1612415711081!5m2!1sid!2sid"
                        frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>

                </div>



                <div class="col-lg-6">

                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">

                        <div class="form-row">

                            <div class="col-md-6 form-group">

                                <input type="text" name="name" class="form-control" id="name" placeholder="Nama"
                                    data-rule="minlen:4" data-msg="Please enter at least 4 chars" />

                                <div class="validate"></div>

                            </div>

                            <div class="col-md-6 form-group">

                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Kamu"
                                    data-rule="email" data-msg="Please enter a valid email" />

                                <div class="validate"></div>

                            </div>

                        </div>

                        <div class="form-group">

                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />

                            <div class="validate"></div>

                        </div>

                        <div class="form-group">

                            <textarea class="form-control" name="message" rows="5" data-rule="required"
                                data-msg="Tuliskan sesuatu untuk kami" placeholder="Pesan"></textarea>

                            <div class="validate"></div>

                        </div>

                        <div class="mb-3">

                            <div class="loading">Loading</div>

                            <div class="error-message"></div>

                            <div class="sent-message">Pesan Anda telah dikirim. Terima kasih!</div>

                        </div>

                        <div class="text-center"><button type="submit">Kirim Pesan</button></div>

                    </form>

                </div>
            </div>
        </div>
    </section> --}}

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
        
                
    </script>

@endsection
