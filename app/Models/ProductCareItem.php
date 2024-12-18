<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCareItem extends Model
{
    use HasFactory;

    protected $table = 'product_care_item';
    protected $guarded = [];

    protected $with = ['product','productCare'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function productCare(){
        return $this->belongsTo(ProductCare::class,'product_care_id');
    }
}
