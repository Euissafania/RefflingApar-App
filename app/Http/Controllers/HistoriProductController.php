<?php

namespace App\Http\Controllers;

use App\Models\ProductCare;
use Illuminate\Http\Request;
use App\Models\ProductCareItem;
use Illuminate\Support\Facades\DB;

class HistoriProductController extends Controller
{

    public function index()
    {
        $datas = ProductCareItem::with('product', 'productCare') 
        ->select('product_id', DB::raw('MAX(refill_count) as reffling_count_data'))
        ->groupBy('product_id') 
        ->get();
        return view('historyProduct.dataHistory',compact('datas'));
    }

    public function show(string $id)
    {
        $data = ProductCare::join('gudang', 'gudang.id', '=', 'product_care.gudang_id')
        ->join('users', 'users.id', '=', 'product_care.created_by')
        ->join('product_care_item', 'product_care_item.product_care_id', '=', 'product_care.id')
        ->join('product', 'product.id', '=', 'product_care_item.product_id')
        ->select(
            'product.name',
            DB::raw('COUNT(product_care_item.product_id) as reffling_count'),
            'gudang.nama_perusahaan',
            'gudang.alamat',
            'users.name as nama_user'
        )
        ->where('product_care_item.product_id', $id) 
        ->groupBy('product.name', 'gudang.nama_perusahaan', 'gudang.alamat', 'users.name')
        ->first();

        return view('historyProduct.detailHistory',compact('data'));
    }

}
