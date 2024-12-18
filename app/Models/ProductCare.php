<?php

namespace App\Models;

use App\Models\Gudang;
use App\Models\ProductCareItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCare extends Model
{
    use HasFactory;

    protected $table = 'product_care';
    protected $guarded = [];

    protected $with = ['gudang'];

    public function gudang(){
        return $this->belongsTo(Gudang::class,'gudang_id');
    }
}
