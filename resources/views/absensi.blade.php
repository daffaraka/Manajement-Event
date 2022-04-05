@extends('layouts.main')

@section('hero')

{{-- Link CSS choose file --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
{{-- end --}}

<!-- ======= Absensi Section ======= -->

<section id="Absensi" class="Absensi section-bg">

    <div class="container mt-5" style="border-radius: 50px 50px 5px 5px;">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">

            <h2 style="padding-top: 40px;">Absensi Event</h2>

        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200">

            <div class="d-flex justify-content-center col-lg-12">

                <form action="" method="post" role="form" class="php-email-form mt-4 mb-3"
                    enctype="multipart/form-data">
                    
                    <div class="form-group">

                        <h6 class="ml-3">Nama</h6>
                        <input type="text" name="name" class="form-control rounded-pill" id="name" placeholder="Nama" onkeypress="return /[a-z, space]/i.test(event.key)" maxlength="25" minlength="3" required>

                        <div class="validate"></div>

                    </div>

                    <div class="form-group">

                        <h6 class="ml-3">Email</h6>
                        <input type="email" name="email" class="form-control rounded-pill" id="email" placeholder="Email" required>

                        <div class="validate"></div>

                    </div>

                    <div class="form-group">

                        <h6 class="ml-3">No. Telephone</h6>
                        <input type="text" name="notel" class="form-control rounded-pill" id="notel" placeholder="No. Telephone" onkeypress="return onlyNumberKey(event)" maxlength="25" minlength="3" required>

                        <div class="validate"></div>

                    </div>
                    
                    <div class="form-group mb-5">

                        <small class="ml-3">Silahkan Kirim Bukti Absensi Anda</small>
                        <input type="file" class="form-control" id="absen" name="absen" placeholder="Absen" required>

                        <div class="validate"></div>

                    </div>
                    
                    <div class="signature-area text-center mx-auto mb-3">
                        <h2 class="title-area text-center">Tanda Tangan</h2>
                        <div class="sig sigWrapper mb-3" style="height:auto;">
                            <div class="typed"></div>
                            <canvas class="sign-pad" id="sign-pad" width="300" height="100" required></canvas>
                        </div>
    
                        <button class="btn-clear">Clear Signature</button>
                        <button type="submit" class="btn-save">Send</button>
                    </div>
                    
                    
                </form>

            </div>

        </div>

    </div>

</section>

<!-- End Absensi Section -->

@endsection
