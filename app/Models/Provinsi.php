<?php

namespace App\Models;

use App\Models\Kabupaten;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provinsi extends Model
{
    use HasFactory;
    protected $table = 'wilayah_provinsi';
    protected $primaryKey = 'id_provinsi';

    public function kabupaten()
    {
        return $this->hasMany(Kabupaten::class);
    }
}
