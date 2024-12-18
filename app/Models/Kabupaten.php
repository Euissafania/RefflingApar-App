<?php

namespace App\Models;

use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kabupaten extends Model
{
    use HasFactory;
    protected $table = 'wilayah_kabupaten';
    protected $primaryKey = 'id_kabupaten';

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}
