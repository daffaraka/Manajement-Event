@extends('adminlte::page')

@section('title', 'Show Narasumber Kegiatan')

@section('content_header')
<h1 class="m-0 text-dark text-center">Show Narasumber Kegiatan</h1>
@stop

@section('content')
<form method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputName">Nama Narasumber</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="exampleInputName" placeholder="Nama Narasumber" name="name"
                            value="{{ $user->name ?? old('name') }}" readonly>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">No Telephone</label>
                        <input type="text" name="notel" class="form-control" id="notel" placeholder="No. Telephone"
                            onkeypress="return onlyNumberKey(event)" readonly>
                        @error('number') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputKota">Kota</label>
                        <select class="form-control" name="kota" id="kota" placeholeder="Kota" disabled>
                            <option value="" muted> Kota </option>
                            <option value="Banda Aceh">Banda Aceh</option>
                            <option value="Langsa">Langsa</option>
                            <option value="Lhokseumawe">Lhokseumawe</option>
                            <option value="Sabang">Sabang</option>
                            <option value="Subulussalam">Subulussalam</option>
                            <option value="Denpasar">Denpasar</option>
                            <option value="Pangkalpinang">Pangkalpinang</option>
                            <option value="Cilegon">Cilegon</option>
                            <option value="Serang">Serang</option>
                            <option value="Tanggerang Selatan">Tanggerang Selatan</option>
                            <option value="Tanggerang">Tanggerang</option>
                            <option value="Bengkulu">Bengkulu</option>
                            <option value="Yogyakarta">Yogyakarta</option>
                            <option value="Gorontalo">Gorontalo</option>
                            <option value="Jakarta Barat">Jakarta Barat</option>
                            <option value="Jakarta Pusat">Jakarta Pusat</option>
                            <option value="Jakarta Selatan">Jakarta Selatan</option>
                            <option value="Jakarta Timur">Jakarta Timur</option>
                            <option value="Jakarta Utara">Jakarta Utara</option>
                            <option value="Sungai Penuh">Sungai Penuh</option>
                            <option value="Jambi">Jambi</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Bekasi">Bekasi</option>
                            <option value="Bogor">Bogor</option>
                            <option value="Cimahi">Cimahi</option>
                            <option value="Cirebon">Cirebon</option>
                            <option value="Depok">Depok</option>
                            <option value="Sukabumi">Sukabumi</option>
                            <option value="Tasikmalaya">Tasikmalaya</option>
                            <option value="Banjar">Banjar</option>
                            <option value="Magelang">Magelang</option>
                            <option value="Pekalongan">Pekalongan</option>
                            <option value="Sala Tiga">Sala Tiga</option>
                            <option value="Semarang">Semarang</option>
                            <option value="Surakarta">Surakarta</option>
                            <option value="Tegal">Tegal</option>
                            <option value="Batu">Batu</option>
                            <option value="Blitar">Blitar</option>
                            <option value="Kediri">Kediri</option>
                            <option value="Madiun">Madiun</option>
                            <option value="Malang">Malang</option>
                            <option value="Mojokerto">Mojokerto</option>
                            <option value="Pasuruan">Pasuruan</option>
                            <option value="Probolinggo">Probolinggo</option>
                            <option value="Surabaya">Surabaya</option>
                            <option value="Pontianak">Pontianak</option>
                            <option value="Singkawang">Singkawang</option>
                            <option value="Banjarbaru">Banjarbaru</option>
                            <option value="Banjarmasin">Banjarmasin</option>
                            <option value="Palangkaraya">Palangkaraya</option>
                            <option value="Balikpapan">Balikpapan</option>
                            <option value="Bontang">Bontang</option>
                            <option value="Samarinda">Samarinda</option>
                            <option value="Tarakan">Tarakan</option>
                            <option value="Batam">Batam</option>
                            <option value="Tanjung Pinang">Tanjung Pinang</option>
                            <option value="Bandar Lampung">Bandar Lampung</option>
                            <option value="Metro">Metro</option>
                            <option value="Ternate">Ternate</option>
                            <option value="Tidore Kepulauan">Tidore Kepulauan</option>
                            <option value="Ambon">Ambon</option>
                            <option value="Tuai">Tuai</option>
                            <option value="Bima">Bima</option>
                            <option value="Mataram">Mataram</option>
                            <option value="Kupang">Kupang</option>
                            <option value="Sorong">Sorong</option>
                            <option value="Jayapura">Jayapura</option>
                            <option value="Dumai">Dumai</option>
                            <option value="Pekanbaru">Pekanbaru</option>
                            <option value="Makassar">Makassar</option>
                            <option value="Palopo">Palopo</option>
                            <option value="Parepare">Parepare</option>
                            <option value="Palu">Palu</option>
                            <option value="Baubau">Baubau</option>
                            <option value="Kendari">Kendari</option>
                            <option value="Bitung">Bitung</option>
                            <option value="Kotamobagu">Kotamobagu</option>
                            <option value="Manado">Manado</option>
                            <option value="Tomohon">Tomohon</option>
                            <option value="Bukit Tinggi">Bukit Tinggi</option>
                            <option value="Padang">Padang</option>
                            <option value="Padang Panjang">Padang Panjang</option>
                            <option value="Pariaman">Pariaman</option>
                            <option value="Payakumbuh">Payakumbuh</option>
                            <option value="Sawahlunto">Sawahlunto</option>
                            <option value="Solok">Solok</option>
                            <option value="LubukLinggau">LubukLinggau</option>
                            <option value="Pagar Alam">Pagar Alam</option>
                            <option value="Palembang">Palembang</option>
                            <option value="Prabumulih">Prabumulih</option>
                            <option value="Sekayu">Sekayu</option>
                            <option value="Gunungsitoli">Gunungsitoli</option>
                            <option value="Medan">Medan</option>
                            <option value="Padang Sidempuan">Padang Sidempuan</option>
                            <option value="Pematangsiantar">Pematangsiantar</option>
                            <option value="Sibolga">Sibolga</option>
                            <option value="TanjungBalai">TanjungBalai</option>
                            <option value="Tebing Tinggi">Tebing Tinggi</option>
                        </select>
                        @error('kota') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputProvinsi">Provinsi</label>
                        <select class="form-control" name="provinsi" id="provinsi" placeholeder="Provinsi" disabled>
                            <option value="" muted> Provinsi </option>
                            <option value="Aceh">Aceh</option>
                            <option value="Bali">Bali</option>
                            <option value="Banten">Banten</option>
                            <option value="Bengkulu">Bengkulu</option>
                            <option value="D.I Yogyakarta">D.I Yogyakarta</option>
                            <option value="D.K.I Jakatra">D.K.I Jakatra</option>
                            <option value="Gorontalo">Gorontalo</option>
                            <option value="Jambi">Jambi</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                            <option value="Kalimantan Barat">Kalimantan Barat</option>
                            <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                            <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                            <option value="Kalimantan Timur">Kalimantan Timur</option>
                            <option value="Kalimantan Utara">Kalimantan Utara</option>
                            <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung
                            </option>
                            <option value="Kepulauan Riau">Kepulauan Riau</option>
                            <option value="Lampung">Lampung</option>
                            <option value="Maluku">Maluku</option>
                            <option value="Maluku Utara">Maluku Utara</option>
                            <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                            <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                            <option value="Papua">Papua</option>
                            <option value="Papua Barat">Papua Barat</option>
                            <option value="Riau">Riau</option>
                            <option value="Sulawesi Barat">Sulawesi Barat</option>
                            <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                            <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                            <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                            <option value="Sulawesi Utara">Sulawesi Utara</option>
                            <option value="Sumatra Barat">Sumatra Barat</option>
                            <option value="Sumatra Selatan">Sumatra Selatan</option>
                            <option value="Sumatra Utara">Sumatra Utara</option>
                        </select>
                        @error('provinsi') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputKota">Pendidikan</label>
                        <select class="form-control" name="kelamin" id="kelamin" placeholeder="Jenis Kelamin" disabled>
                            <option value="" muted> Pendidikan </option>
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

                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputKota">Pekerjaan</label>
                        <select class="form-control" name="kelamin" id="kelamin" placeholeder="Jenis Kelamin" disabled>
                            <option value="" muted> Pekerjaan </option>
                            <option value="Pelajar">Pelajar</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="ASN/TNI/Polri">ASN/TNI/Polri</option>
                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                            <option value="Wirausaha">Wirausaha</option>
                            <option value="Freelancer">Freelancer</option>
                            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>

                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJeniskelamin">Jenis kelamin</label>
                        <select class="form-control" name="kelamin" value="{{ old('jeniskelamin') }}" id="kelamin"
                            placeholeder="Jenis Kelamin" disabled>
                            <option value="" muted> Jenis Kelamin </option>
                            <option value="1">Laki-Laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                        @error('jeniskelamin') <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            id="exampleInputEmail" placeholder="Masukkan Email" name="email"
                            value="{{ $user->email ?? old('email') }}" readonly>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <a href="/narasumberkegiatan" class="btn bg-gray-dark">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop

