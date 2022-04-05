<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriNarasumber extends Model
{
    
    protected $table = 'kategori_narasumber';
    protected $primaryKey  = 'id_kategori';
    protected $guarded = [];


    public function Narasumber()
    {
        return $this->hasMany(Narasumber::class,'id_kategori_narasumber','id_kategori');
    }
}
