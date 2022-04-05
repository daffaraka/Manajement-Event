@extends('layouts.main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<meta name="csrf-token" content="{{ csrf_token() }}" />

<section id="hasil-pencarian">
    <div class="container">
        <div class="row mt-5 pt-5">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-12">
                @if(isset($searchResults))
                    
                    @if ($searchResults-> isEmpty())
                    <div class="container" style="min-height: 300px">
                        <h2>Tidak terdapat data yang anda input. <b>"{{ $searchterm }}"</b>.</h2>
                    </div>
                      
                    @else
                    <h2>Ditemukan sejumlah {{ $searchResults->count() }} hasil untuk pencarian <b>"{{ $searchterm }}"</b></h2>
                    <hr />
                    @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                       {{-- <h1>{{ ucwords($type) }}</h1> --}}
    
                       <div class="container">
                        <div class="row">
                            @foreach($modelSearchResults as $searchResult)
                            <div class="col-lg-3 mb-2 content">
                              
                                <div class="card mb-4" style="min-height: 420px">
                                   
                                        <img src="{{asset('files/'.$searchResult->banner)}}" class="card-img-top" height="140px">
                                        <div class="caption mt-2 p-3">
                                            <div class="description" style="min-height: 190px">
                                                <h6 class="ml-1 text-info"> {{ $searchResult->title }} </h6>
                                                <p class="ml-1 text-dark font-weight-bold"><i class="icofont-calendar"></i>{{ \Carbon\Carbon::parse($searchResult->waktu)->format('l, d/M/Y, h:i:s')}}</p>
                                                <p class="ml-1 text-dark"><i class="icofont-location-pin"></i>{{ $searchResult->kota }},{{ $searchResult->provinsi }} </p>    
                                                <h6><i class="icofont-globe"></i> {{$searchResult->jenis}}</h6>
                                            </div>
                                            @if (\Carbon\Carbon::parse($searchResult->waktu)->lt($dateNow))
                                            <a href="#" class="btn btn-sm btn-danger flex justify-content-end disabled">Event Berakhir </a>
                                            @endif
                                             <a href="{{ $searchResult->url }}" class="btn btn-sm btn-primary flex justify-content-end">See More </a>
                                            
                                        </div>
                                       
                                   
                                </div>
                               
                                
                            </div>
                            @endforeach
                        </div>
                       </div>
                        
                                    
                            
                      
                    @endforeach
                @endif
            @endif
            </div>
        </div>
    </div>
</section>