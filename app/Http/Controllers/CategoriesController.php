<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Category::get();
        return view('category.dataCategory', compact('datas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_category' => 'required',
        ]);
       if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            Category::create([
                'name_category' => $request->name_category,
            ]);
            return redirect('category')->with('success', 'Data Added Successfully');
        } catch (\Exception $e) {
            return redirect('category')->with('error', 'Failed to add data. Error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
