<?php

namespace Spatie\Searchable;

class SearchResult
{
    /** @var \Spatie\Searchable\Searchable */
    public $searchable;

    /** @var string */
    public $title;

    /** @var null|string */
    public $url;

    /** @var string */
    public $type;


    public function __construct(Searchable $searchable, string $title, ?string $url = null, string $banner,string $waktu,string $provinsi,string $kota, string $jenis)
    {
        $this->searchable = $searchable;

        $this->title = $title;

        $this->url = $url;
        
        $this->banner =$banner;

        $this->waktu =$waktu;

        $this->provinsi =$provinsi;

        $this->kota =$kota;
        
        $this->jenis = $jenis;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
