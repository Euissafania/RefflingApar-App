<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCare;
use Illuminate\Http\Request;
use App\Models\ProductCareItem;
use Illuminate\Support\Facades\Auth;

class HistoriController extends Controller
{
    
    public function index()
    {
        $datas = ProductCareItem::with(['product', 'productCare.gudang'])
        ->whereHas('productCare')->get();
        return view('historyReffling.dataHistory', compact('datas'));
    }

    public function edit(string $id)
    {
        $data = ProductCare::join('gudang', 'gudang.id', '=', 'product_care.gudang_id')
        ->join('product_care_item', 'product_care_item.product_care_id', '=', 'product_care.id')
        ->join('product', 'product.id', '=', 'product_care_item.product_id')
        ->where('product_care.id', $id)
        ->select('product.name', 'product_care.*', 'gudang.nama_perusahaan','gudang.alamat')
        ->first();

        return view('historyReffling.historyUpdate', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_care_status' => 'required|in:0,1,2',
        ]);

        $productCare = ProductCare::findOrFail($id);

        if ($request->product_care_status == 1) {
            $productCare->update([
                'product_care_status' => 1,
            ]);

            return redirect('history')->with('success', 'Status berhasil diperbarui menjadi "Diproses"');
        } elseif ($request->product_care_status == 2) 
        {
            $productCare->update([
                'product_care_status' => 2,
            ]);

            $productCareItems = ProductCareItem::where('product_care_id', $productCare->id)->get();

            foreach ($productCareItems as $item) {
                $product = Product::findOrFail($item->product_id);
                $product->decrement('stock', 1); 
                $refillCount = ProductCareItem::where('product_id', $item->product_id)->count();
                $item->update([
                    'refill_count' => $refillCount,
                ]);
            }
            return redirect('history')->with('success', 'Status berhasil diperbarui menjadi "Selesai" dan stok serta refill_count berhasil diperbarui');
        }

        return redirect('history')->with('error', 'Gagal memperbarui status');
    }
}
