<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Search;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Kegiatan extends Model implements Searchable
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';
    protected $guarded = [];

    protected $fillable = [
        'banner',
        'namakegiatan',
        'kota',
        'provinsi',
        'waktu',
        'jenis',
        'target',
        'undangan',
        'deskripsi',
        'anggaran',
        'rundown',
        'mediapromosi',
    ];

    public function Peserta()
    {
        return $this->hasMany(Peserta::class);
    }

    
    public function getSearchResult(): SearchResult
    {
        $url = route('detailKegiatan.show',$this->id_kegiatan);
        $banner = $this->banner;
        $waktu = $this->waktu;
        $provinsi = $this->provinsi;
        $kota = $this->kota;
        $jenis = $this->jenis;
        return new SearchResult(
            $this,
            $this->namakegiatan,    
            $url,
            $banner,
            $waktu,
            $provinsi,
            $kota,
            $jenis,
        );
    }

    protected $casts = [
        'waktu' => 'datetime:d - M - Y ,H:i:s',
    ];

}
