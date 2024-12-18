<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index()
    {
        $datas = Product::with('category')->get();
        return view('product.dataProduct', compact('datas'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('product.createData', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_category' => 'required|integer',
            'name' => 'required|string|max:255',
            'PNO' => 'required|string|max:45',
            'price_lama' => 'required|numeric',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'required|string',
            'minQty' => 'required|integer',
            'weight' => 'required|numeric',
            'expired' => 'required|integer',
            'warranty' => 'required|integer',
            'expiredSNI' => 'required|integer',
            'warrantySNI' => 'required|integer',
            'status' => 'required|integer',
            'panjang' => 'required|numeric',
            'lebar' => 'required|numeric',
            'tinggi' => 'required|numeric',
            'fire_rating' => 'required|string',
            'media' => 'required|string',
            'type' => 'required|string',
            'kapasitas' => 'required|string',
            'kelas_kebakaran' => 'required|string',
            'tabung_silinder' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $data = $request->all();
    
        $lastSN = DB::table('product')
        ->max('createSN');
        $lastSN = $lastSN ? $lastSN : 0;
        $data['createSN'] = $lastSN + 1;
    
        $data['created_by'] = Auth::id();
    
        try {
    
            Product::create($data);
            return redirect('/product')->with('success', 'Data Added Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/product')->with('error', 'Failed to add data. Error: ' . $e->getMessage());
        }
    }
    
}
