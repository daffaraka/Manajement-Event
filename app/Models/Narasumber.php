<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Narasumber extends Model
{
    protected $table = 'narasumber';
    protected $primary = 'id';
    protected $guarded = [];

    protected $fillable = [
        'id_kategori_narasumber',
        'nama',
        'nomorhp',
        'email',
        'jk',
        'pendidikan',
        'pekerjaan',
        'kota',
        'provinsi',
        'nama_kategori_narasumber',
    ];

    public function kategori_narasumber()
    {
        return $this->belongsTo(KategoriNarasumber::class,'id_kategori','id_kategori_narasumber');
    }
}
