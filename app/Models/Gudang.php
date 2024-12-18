<?php

namespace App\Models;

use App\Models\Provinsi;
use App\Models\Kabupaten;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gudang extends Model
{
    use HasFactory;
    protected $table = 'gudang';
    protected $guarded = [];
    protected $with = ['provinsi','kabupaten'];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class,'id_provinsi');
    }
    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'id_kabupaten');
    }
}
