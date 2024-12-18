<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\Product;
use App\Models\ProductCare;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCareItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PemesananController extends Controller
{

    public function index()
    {
        $datas = ProductCare::join('gudang', 'gudang.id', '=', 'product_care.gudang_id')
        ->join('product_care_item', 'product_care_item.product_care_id', '=', 'product_care.id')
        ->join('product', 'product.id', '=', 'product_care_item.product_id')
        ->where('product_care.created_by', Auth::id())
        ->select('product.name', 'product_care.*', 'gudang.nama_perusahaan')
        ->get();
        return view('pemesanan.dataPemesanan', compact('datas'));
    }

    public function create()
    {
        $gudang = Gudang::get();
        $products = Product::get();
        return view('pemesanan.createData', compact('gudang','products'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gudang_id' => 'required|exists:gudang,id',
            'product_id' => 'required|exists:product,id',
            'customer_name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:13',
            'latitude_pickup' => 'required|numeric',
            'longitude_pickup' => 'required|numeric',
            'product_care_date' => 'required|date',
            'total' => 'required|numeric',
            'payment_method' => 'required|in:1,2,3', 
            'product_care_type' => 'required|in:1,2',  
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
       
       
        switch ($request->payment_method) {
            case 1: // Transfer Bank
                $paymentStatus = 2; // Menunggu konfirmasi (pending)
                break;
            case 2: // Kartu Kredit
                $paymentStatus = 1; // Pembayaran berhasil
                break;
            case 3: // E-wallet
                $paymentStatus = 1; // Pembayaran berhasil
                break;
        }
       
        try {
    
           $productCare =  ProductCare::create([
            'gudang_id' => $request->gudang_id,
            'customer_name' => $request->customer_name,
            'phone_number' => $request->phone_number,
            'latitude_pickup' => $request->latitude_pickup,
            'longitude_pickup' => $request->longitude_pickup,
            'product_care_date' => $request->product_care_date,
            'total' => $request->total,
            'payment_method' => $request->payment_method,
            'payment_status' => $paymentStatus,
            'product_care_type' => $request->product_care_type,
            'product_care_status' => 0,
            'created_by' => Auth::id()
           ]);

            ProductCareItem::create([
               'product_id' => $request->product_id,
               'product_care_id' => $productCare->id,
               'serial_number' => 'SN-' . Str::uuid(),
               'refill_count'  => 0,
            ]);
            return redirect('/pemesanan')->with('success', 'Data Added Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/pemesanan')->with('error', 'Failed to add data. Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ProductCare::join('gudang', 'gudang.id', '=', 'product_care.gudang_id')
        ->join('product_care_item', 'product_care_item.product_care_id', '=', 'product_care.id')
        ->join('product', 'product.id', '=', 'product_care_item.product_id')
        ->where('product_care.id', $id)
        ->select('product.name', 'product_care.*', 'gudang.nama_perusahaan','gudang.alamat')
        ->first();

        return view('pemesanan.showData', compact('data'));
    }

}
