@extends('layouts.main')

@section('hero')
    {{-- List Event card Besar Section --}}

    <section id="profile" class="profile section-bg">

        <div class="container mt-5" style="border-radius: 50px 50px 5px 5px;">

            <div class="section-title" data-aos="fade-in" data-aos-delay="100">

                <h2 style="padding-top: 40px;">Profile</h2>

            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="200">

                <div class="d-flex justify-content-center col-lg-12">

                    <form action="" method="post" role="form" class="php-email-form mt-4 mb-3 w-75">

                        <div class="form-group">

                            <h6 class="ml-3">Nama</h6>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nama" disabled
                                muted>

                            <div class="validate"></div>

                        </div>

                        <div class="form-group">

                            <h6 class="ml-3">Email</h6>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" disabled
                                muted>

                            <div class="validate"></div>

                        </div>

                        <div class="form-group">

                            <h6 class="ml-3">No. Telephone</h6>
                            <input type="number" name="notel" class="form-control" id="notel" placeholder="No. Telephone"
                                onkeypress="return onlyNumberKey(event)" disabled muted>

                            <div class="validate"></div>

                        </div>

                        <div class="form-row">

                            <div class="col-md-6 form-group">

                                <h6 class="ml-3">Provinsi</h6>
                                <select id="state" name="state" class="form-control" disabled>
                                    <option value="" selected disabled>Pilih Provinsi</option>
                                    @foreach ($states as $key => $state)
                                        <option value="{{ $key }}"> {{ $state }}</option>
                                    @endforeach
                                </select>

                                <div class="validate"></div>

                            </div>

                            <div class="col-md-6 form-group">

                                <h6 class="ml-3">Kota/Kabupaten</h6>
                                <select name="city" id="city" class="form-control" disabled></select>

                                <div class="validate"></div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

    {{-- End --}}
@endsection
