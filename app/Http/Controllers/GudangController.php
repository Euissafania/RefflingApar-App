<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GudangController extends Controller
{

    public function index()
    {
        $datas = Gudang::with('provinsi','kabupaten')->get();
        return view('gudang.dataGudang', compact('datas'));
    }

    public function create()
    {
        $provinsi = Provinsi::all(); 
        $user = Auth::user();
        return view('gudang.createData', compact('provinsi','user'));
    }
      public function getKabupaten($id_provinsi)
    {
        $kabupaten = Kabupaten::where('id_provinsi', $id_provinsi)->get(['id_kabupaten as id', 'nama_kabupaten as nama']);
        return response()->json($kabupaten);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_provinsi' => 'required',
            'id_kabupaten' => 'required',
            'location' => 'required',
            'status' => 'required',
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $data['created_by'] = Auth::id(); 
    
        try {
            Gudang::create($data);
            return redirect('/gudang')->with('success', 'Data Added Successfully');
        } catch (\Exception $e) {
            return redirect('/gudang')->with('error', 'Failed to add data. Error: ' . $e->getMessage());
        }
    }
}
