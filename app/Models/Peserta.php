<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
     use HasFactory;

    protected $table = 'peserta';
    public $timestamps = false;

    protected $fillable = [
        'id_kegiatan',
        'name',
        'email',
        'usia',
        'jk',
        'nomorhp',
        'kota',
        'provinsi',
        'pendidikan',
        'pekerjaan'
    ];

    function image()
    {
        if ($this->image && file_exists(public_path('images/post/' . $this->image)))
            return asset('images/post/' . $this->image);
        else
            return asset('images/no_image.png');
    }

    function delete_image()
    {
        if ($this->image && file_exists(public_path('images/post/' . $this->image)))
            return unlink(public_path('images/post/' . $this->image));
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class,'id_kegiatan');
    }
}
