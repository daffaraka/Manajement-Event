<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'tb_pertanyaan';
    protected $primaryKey = 'pertanyaan_id';

    protected $fillable = [
        'pertanyaan_title',
        'jawaban',
        'content',
    ];

}
