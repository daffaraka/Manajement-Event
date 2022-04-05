@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <p>Welcome to this beautiful admin panel.</p>
    <hr>

    <div class="row">

        <div class="col-sm-4">

            <div class="card">

                <div class="card-body rounded bg-primary">

                    <h5 class="card-title">Jumlah Pencapaian Target Peserta</h5>

                    <p class="card-text fa-2x">100</p>

                </div>

            </div>

        </div>

        <!-- Main content -->
        <div class="content">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-6">

                        {{-- Grafik peserta per-wilayah --}}
                        <div class="card">

                            <div class="card-header border-0">

                                <div class="d-flex justify-content-between">

                                    <h3 class="card-title">Grafik peserta per-wilayah</h3>

                                    <p class="ml-auto d-flex flex-column text-right">

                                        <span class="text-success">

                                            <i class="fas fa-arrow-up"></i> 33.1%

                                        </span>

                                        <span class="text-muted">Since last month</span>

                                    </p>

                                </div>

                            </div>

                            <div class="card-body">

                                <div class="position-relative mb-4">

                                    <canvas id="pesertaWilayah" height="200"></canvas>

                                </div>

                            </div>

                        </div>
                        {{-- End --}}

                        {{-- Grafik peserta per-bulan --}}
                        <div class="card">

                            <div class="card-header border-0">

                                <div class="d-flex justify-content-between">

                                    <h3 class="card-title">Grafik peserta per-bulan</h3>

                                </div>

                            </div>

                            <div class="card-body">

                                <div class="position-relative mb-4">

                                    <canvas id="pesertaBulan" height="200"></canvas>

                                </div>

                            </div>

                        </div>
                        {{-- End --}}

                    </div>

                    <div class="col-lg-6">

                        {{-- Grafik jumlah kegiatan per-Wilayah --}}
                        <div class="card">

                            <div class="card-header border-0">

                                <div class="d-flex justify-content-between">

                                    <h3 class="card-title">Grafik jumlah kegiatan per-wilayah</h3>

                                    <p class="ml-auto d-flex flex-column text-right">

                                        <span class="text-success">

                                            <i class="fas fa-arrow-up"></i> 33.1%

                                        </span>

                                        <span class="text-muted">Since last month</span>

                                    </p>

                                </div>

                            </div>

                            <div class="card-body">

                                <div class="position-relative mb-4">

                                    <canvas id="kegiatanWilayah" height="200"></canvas>

                                </div>

                            </div>

                        </div>
                        {{-- End --}}

                        {{-- Grafik jumlah kegiatan per-bulan --}}
                        <div class="card">

                            <div class="card-header border-0">

                                <div class="d-flex justify-content-between">

                                    <h3 class="card-title">Grafik jumlah kegiatan per-bulan</h3>

                                </div>

                            </div>

                            <div class="card-body">

                                <div class="position-relative mb-4">

                                    <canvas id="kegiatanBulan" height="200"></canvas>

                                </div>

                            </div>

                        </div>
                        {{-- End --}}

                    </div>

                    <div class="col-lg-6">

                        {{-- Grafik peserta per-EO --}}
                        <div class="card">

                            <div class="card-header border-0">

                                <div class="d-flex justify-content-between">

                                    <h3 class="card-title">Grafik jumlah peserta per-EO</h3>

                                    <p class="ml-auto d-flex flex-column text-right">

                                        <span class="text-success">

                                            <i class="fas fa-arrow-up"></i> 33.1%

                                        </span>

                                        <span class="text-muted">Since last Event</span>

                                    </p>

                                </div>

                            </div>

                            <div class="card-body">

                                <div class="position-relative mb-4">

                                    <canvas id="pesertaEO" height="200"></canvas>

                                </div>

                            </div>

                        </div>
                        {{-- End --}}

                    </div>

                    <div class="col-lg-6">

                        {{-- Grafik kegiatan per-EO --}}
                        <div class="card">

                            <div class="card-header border-0">

                                <div class="d-flex justify-content-between">

                                    <h3 class="card-title">Grafik jumlah kegiatan per-EO</h3>

                                    <p class="ml-auto d-flex flex-column text-right">

                                        <span class="text-success">

                                            <i class="fas fa-arrow-up"></i> 33.1%

                                        </span>

                                        <span class="text-muted">Since last Event</span>

                                    </p>

                                </div>

                            </div>

                            <div class="card-body">

                                <div class="position-relative mb-4">

                                    <canvas id="kegiatanEO" height="200"></canvas>

                                </div>

                            </div>

                        </div>
                        {{-- End --}}

                    </div>

                </div>
                <!-- End row -->

            </div>
            <!-- End container-fluid -->

        </div>

        <div class="col-sm-4">

            <div class="card">

                <div class="card-body rounded bg-info">

                    <h5 class="card-title">Jumlah Event Yang sedang Berjalan</h5>

                    <p class="card-text fa-2x">100</p>

                </div>

            </div>

        </div>

        <div class="col-sm-6">

            <div class="card">

                <div class="card-body rounded bg-success">

                    <h5 class="card-title">Total Keseluruhan Event</h5>

                    <p class="card-text fa-2x">100</p>

                </div>

            </div>

        </div>
        <div class="col-sm-6">

            <div class="card">

                <div class="card-body rounded bg-danger">

                    <h5 class="card-title">Jumlah Event Yang Tidak Berjalan</h5>

                    <p class="card-text fa-2x">100</p>

                </div>

            </div>

        </div>

        {{-- End --}}

        {{-- Khusus Pengawas --}}
        <div class="col-sm-4">

            <div class="card">

                <div class="card-body rounded bg-success">

                    <h5 class="card-title">Pelaporan Yang Sudah Di Isi</h5>

                    <p class="card-text fa-2x">100</p>

                </div>

            </div>

        </div>

        <div class="col-sm-4">

            <div class="card">

                <div class="card-body rounded bg-primary">

                    <h5 class="card-title">Jumlah Seluruh Laporan</h5>

                    <p class="card-text fa-2x">100</p>

                </div>

            </div>

        </div>

        <div class="col-sm-4">

            <div class="card">

                <div class="card-body rounded bg-warning">

                    <h5 class="card-title">Pelaporan Belum Di Isi</h5>

                    <p class="card-text fa-2x">100</p>

                </div>

            </div>

        </div>
        {{-- End --}}

    </div>

    <!-- Main content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-6">

                    {{-- Grafik peserta per-wilayah (Pengawas Tidak Bisa Melihat) --}}
                    <div class="card">

                        <div class="card-header border-0">

                            <div class="d-flex justify-content-between">

                                <h3 class="card-title">Grafik peserta per-wilayah</h3>

                                <p class="ml-auto d-flex flex-column text-right">

                                    <span class="text-success">

                                        <i class="fas fa-arrow-up"></i> 33.1%

                                    </span>

                                    <span class="text-muted">Since last month</span>

                                </p>

                            </div>

                        </div>

                        <div class="card-body">

                            <div class="position-relative mb-4">

                                <canvas id="pesertaWilayah" height="200"></canvas>

                            </div>

                        </div>

                    </div>
                    {{-- End --}}

                    {{-- Grafik peserta per-bulan (Pengawas Tidak Bisa Melihat) --}}
                    <div class="card">

                        <div class="card-header border-0">

                            <div class="d-flex justify-content-between">

                                <h3 class="card-title">Grafik peserta per-bulan</h3>

                            </div>

                        </div>

                        <div class="card-body">

                            <div class="position-relative mb-4">

                                <canvas id="pesertaBulan" height="200"></canvas>

                            </div>

                        </div>

                        {{-- End --}}

                    </div>

                    <div class="col-lg-6">

                        {{-- Grafik jumlah kegiatan per-Wilayah --}}
                        <div class="card">

                            <div class="card-header border-0">

                                <div class="d-flex justify-content-between">

                                    <h3 class="card-title">Grafik jumlah kegiatan per-wilayah</h3>

                                    <p class="ml-auto d-flex flex-column text-right">

                                        <span class="text-success">

                                            <i class="fas fa-arrow-up"></i> 33.1%

                                </div>

                                <div class="card-body">

                                    <div class="position-relative mb-4">

                                        <canvas id="kegiatanWilayah" height="200"></canvas>

                                    </div>

                                </div>

                            </div>

                            <div class="card-body">

                                <div class="position-relative mb-4">

                                    <canvas id="pesertaBulan" height="200"></canvas>

                                </div>

                            </div>

                        </div>
                        {{-- End --}}

                    </div>

                    <div class="col-lg-6">

                        {{-- Grafik jumlah kegiatan per-Wilayah --}}
                        <div class="card">

                            <div class="card-header border-0">

                                <div class="d-flex justify-content-between">

                                    <h3 class="card-title">Grafik jumlah kegiatan per-wilayah</h3>

                                    <p class="ml-auto d-flex flex-column text-right">

                                        <span class="text-success">

                                            <i class="fas fa-arrow-up"></i> 33.1%

                                        </span>

                                        <span class="text-muted">Since last month</span>

                                    </p>

                                </div>

                            </div>

                            <div class="card-body">

                                <div class="position-relative mb-4">

                                    <canvas id="kegiatanWilayah" height="200"></canvas>

                                </div>

                            </div>

                        </div>
                        {{-- End --}}

                        {{-- Grafik jumlah kegiatan per-bulan --}}
                        <div class="card">

                            <div class="card-header border-0">

                                <div class="d-flex justify-content-between">

                                    <h3 class="card-title">Grafik jumlah kegiatan per-bulan</h3>

                                </div>

                            </div>

                            <div class="card-body">

                                <div class="position-relative mb-4">

                                    <canvas id="kegiatanBulan" height="200"></canvas>

                                </div>

                            </div>

                        </div>
                        {{-- End --}}

                    </div>

                    <div class="col-lg-6">

                        {{-- Grafik peserta per-EO --}}
                        <div class="card">

                            <div class="card-header border-0">

                                <div class="d-flex justify-content-between">

                                    <h3 class="card-title">Grafik jumlah peserta per-EO</h3>

                                    <p class="ml-auto d-flex flex-column text-right">

                                        <span class="text-success">

                                            <i class="fas fa-arrow-up"></i> 33.1%

                                        </span>

                                        <span class="text-muted">Since last Event</span>

                                    </p>

                                </div>

                            </div>

                            <div class="card-body">

                                <div class="position-relative mb-4">

                                    <canvas id="pesertaEO" height="200"></canvas>

                                </div>

                            </div>

                        </div>
                        {{-- End --}}

                    </div>

                    <div class="col-lg-6">

                        {{-- Grafik kegiatan per-EO --}}
                        <div class="card">

                            <div class="card-header border-0">

                                <div class="d-flex justify-content-between">

                                    <h3 class="card-title">Grafik jumlah kegiatan per-EO</h3>

                                    <p class="ml-auto d-flex flex-column text-right">

                                        <span class="text-success">

                                            <i class="fas fa-arrow-up"></i> 33.1%

                                        </span>

                                        <span class="text-muted">Since last Event</span>

                                    </p>

                                </div>

                            </div>

                            <div class="card-body">

                                <div class="position-relative mb-4">

                                    <canvas id="kegiatanEO" height="200"></canvas>

                                </div>

                            </div>

                        </div>
                        {{-- End --}}

                    </div>

                </div>
                <!-- End row -->

            </div>
            <!-- End container-fluid -->

        </div>
        <!-- End content -->
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>

    {{-- Script Chart Peserta Wilayah --}}
    <script>
        const ctx = document.getElementById('pesertaWilayah').getContext('2d');
        const pesertaWilayah = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jawa', 'Sumatra', 'Kalimantan', 'Sulawesi', 'Papua', 'Nusa Tenggara'],
                datasets: [{
                    label: 'Grafik Peserta Per-Wilayah',
                    data: [10, 10, 10, 10, 10, 10, ],
                    backgroundColor: [
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                    ],
                    borderWidth: 1
                }, {
                    label: 'Bulan Ini',
                    data: [65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65],
                    backgroundColor: [
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    {{-- End --}}
    {{-- Script Chart Peserta Bulan --}}
    <script>
        const ctx2 = document.getElementById('pesertaBulan').getContext('2d');
        const pesertaBulan = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['Januari', 'Febuari', 'Mai', 'April', 'Maret', 'Juni', 'Juli', 'Agustus', 'September',
                    'October', 'November', 'December'
                ],
                datasets: [{
                        label: 'Grafik Jumlah Kegiatan Per-Bulan',
                        data: [10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, ],
                        backgroundColor: [
                            '#007BFF',
                            '#007BFF',
                            '#007BFF',
                            '#007BFF',
                            '#007BFF',
                            '#007BFF',
                            '#007BFF',
                            '#007BFF',
                            '#007BFF',
                            '#007BFF',
                            '#007BFF',
                            '#007BFF'
                        ],
                        data: [5, 15, 12, 7, 11, 6, 20, 17, 5, 7, 15, 12],
                        fill: false,
                        tension: 0.1,
                        borderColor: [
                            'rgb(75, 192, 192)'
                        ]
                        labels: ['Januari', 'Febuari', 'Maret', 'April', 'Mai', 'Juni', 'Juli',
                            'Agustus', 'September', 'October', 'November', 'December'
                        ],
                        datasets: [{
                                label: 'Tahun Lalu',
                                data: [0, 5, 15, 26, 14, 19, 27, 37, 49, 60, 55, 70],
                                fill: false,
                                tension: 0.1,
                                borderColor: [
                                    'rgb(128, 128, 128, 0.18)',
                                ],
                            },
                            {
                                label: 'Tahun Ini',
                                data: [100, 120, 190, 300, 400, 450, 600, 700, 650, 700, 750, 800],
                                fill: false,
                                tension: 0.1,
                                borderColor: [
                                    'rgb(54, 162, 235)',
                                ],
                            }
                        ]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                ];
            }
        })
    </script>
    {{-- End --}}

    {{-- Script Jumlah Kegiatan Wilayah --}}
    <script>
        const ctx3 = document.getElementById('kegiatanWilayah').getContext('2d');
        const kegiatanWilayah = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: ['Jawa', 'Sumatra', 'Kalimantan', 'Sulawesi', 'Papua', 'Nusa Tenggara'],
                datasets: [{
                    label: 'Bulan Lalu',
                    data: [55, 55, 55, 55, 55, 55, 55, 55, 55, 55, 55, 55],
                    backgroundColor: [
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                    ],
                    borderWidth: 1
                }, {
                    label: 'Bulan Ini',
                    data: [65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65],
                    backgroundColor: [
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    {{-- End --}}
    <script>
        const ctx4 = document.getElementById('kegiatanBulan').getContext('2d');
        const kegiatanBulan = new Chart(ctx4, {
            type: 'line',
            data: {
                labels: ['Januari', 'Febuari', 'Mai', 'April', 'Maret', 'Juni', 'Juli', 'Agustus', 'September',
                    'October', 'November', 'December'
                ],
                datasets: [{
                        label: 'Grafik Jumlah Kegiatan Per-Bulan',
                        data: [5, 15, 12, 7, 11, 6, 20, 17, 5, 7, 15, 12],
                        fill: false,
                        tension: 0.1,
                        borderColor: [
                            'rgb(75, 192, 192)'
                        ],
                        labels: ['Januari', 'Febuari', 'Maret', 'April', 'Mai', 'Juni', 'Juli',
                            'Agustus', 'September', 'October', 'November', 'December'
                        ],
                        datasets: [{
                            label: 'Tahun Lalu',
                            data: [0, 5, 15, 26, 14, 19, 27, 37, 49, 60, 55, 70],
                            fill: false,
                            tension: 0.1,
                            borderColor: [
                                'rgb(128, 128, 128, 0.18)',
                            ],
                        }, {
                            label: 'Tahun Ini',
                            data: [10, 12, 19, 30, 40, 45, 60, 70, 90, 100, 150, 250],
                            fill: false,
                            tension: 0.1,
                            borderColor: [
                                'rgb(54, 162, 235)',
                            ],
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                ];
            }
        })
    </script>
    {{-- End --}}

    {{-- Script Jumlah Peserta Wilayah EO --}}
    <script>
        const ctx5 = document.getElementById('pesertaEO').getContext('2d');
        const pesertaEO = new Chart(ctx5, {
            type: 'bar',
            data: {
                labels: ['Nama-EO', 'Nama-EO', 'Nama-EO', 'Nama-EO', 'Nama-EO', 'Nama-EO', 'Nama-EO', 'Nama-EO',
                    'Nama-EO'
                ],
                labels: ['Nama-EO', 'Nama-EO', 'Nama-EO', 'Nama-EO', 'Nama-EO', 'Nama-EO', 'Nama-EO', 'Nama-EO',
                    'Nama-EO', 'Nama-EO', 'Nama-EO', 'Nama-EO'
                ],
                datasets: [{
                    label: 'Bulan Lalu',
                    data: [55, 55, 55, 55, 55, 55, 55, 55, 55, 55, 55, 55],
                    backgroundColor: [
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                        'rgb(128, 128, 128, 0.18)',
                    ],
                    borderWidth: 1
                }, {
                    label: 'Bulan Ini',
                    data: [65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65],
                    backgroundColor: [
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    {{-- End --}}

    {{-- Script Jumlah Kegiatan EO --}}
    <script>
        const ctx6 = document.getElementById('kegiatanEO').getContext('2d');
        const kegiatanEO = new Chart(ctx6, {
            type: 'radar',
            data: {
                labels: ['Nama-EO', 'Nama-EO', 'Nama-EO', 'Nama-EO', 'Nama-EO', 'Nama-EO', 'Nama-EO', 'Nama-EO',
                    'Nama-EO', 'Nama-EO', 'Nama-EO', 'Nama-EO'
                ],
                datasets: [{
                    fill: true,
                    label: 'Bulan Lalu',
                    data: [10, 12, 14, 8, 17, 19, 5, 18, 8, 21, 14, 17],
                    backgroundColor: 'rgb(128, 128, 128, 0.18)',
                    borderColor: 'rgb(128, 128, 128, 0.40)',
                    pointBackgroundColor: 'grey',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(255, 99, 132)'
                }, {
                    label: 'Bulan Ini',
                    data: [20, 13, 16, 10, 22, 19, 14, 18, 9, 21, 17, 20],
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)',
                    pointBackgroundColor: 'rgb(54, 162, 235)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(54, 162, 235)'
                }]
            },
            options: {
                scales: {
                    ticks: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    {{-- End --}}
@stop
