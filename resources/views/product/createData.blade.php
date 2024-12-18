@extends('layouts.index')
@section('content')

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Create Data Gudang</h4>
                </div>
            </div>
          
            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row">
                        <!-- Kolom pertama -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="categories">Category</label>
                                <select name="id_category" class="form-control @error('id_category') is-invalid @enderror">
                                    <option value="">Pilih Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name_category }}</option>
                                    @endforeach
                                </select>
                                @error('id_category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" id="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name" />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="PNO">PNO (Part Numbr)</label>
                                <input name="PNO" id="PNO" class="form-control @error('PNO') is-invalid @enderror" type="number" placeholder="PNO" />
                                @error('PNO')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="price_lama">Price Lama</label>
                                <input name="price_lama" id="price_lama" class="form-control @error('price_lama') is-invalid @enderror" type="text" placeholder="RP. " />
                                @error('price_lama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input name="price" id="price" class="form-control @error('price') is-invalid @enderror" type="text" placeholder="RP. " />
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" type="number" placeholder="Stock" />
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="minQty">Minimal Qty</label>
                                <input name="minQty" id="minQty" class="form-control @error('minQty') is-invalid @enderror" type="number" placeholder="Minimal Qty" />
                                @error('minQty')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="weight">Weight</label>
                                <input name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" type="text" placeholder="Weight" />
                                @error('weight')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="expired">Expired</label>
                                <input name="expired" id="expired" class="form-control @error('expired') is-invalid @enderror" type="text" placeholder="Expired" />
                                @error('expired')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="warranty">Warranty</label>
                                <input name="warranty" id="warranty" class="form-control @error('warranty') is-invalid @enderror" type="text" placeholder="Warranty" />
                                @error('warranty')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="expiredSNI">Expired SNI</label>
                                <input name="expiredSNI" id="expiredSNI" class="form-control @error('expiredSNI') is-invalid @enderror" type="text" placeholder="Expired SNI" />
                                @error('expiredSNI')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="warrantySNI">Warranty SNI</label>
                                <input name="warrantySNI" id="warrantySNI" class="form-control @error('warrantySNI') is-invalid @enderror" type="text" placeholder="Warranty SNI" />
                                @error('warrantySNI')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <!-- Kolom kedua -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="">Pilih Status</option>
                                    <option value="0">Tidak Aktif</option>
                                    <option value="1">Aktif</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="panjang">Panjang</label>
                                <input name="panjang" id="panjang" class="form-control @error('panjang') is-invalid @enderror" type="text" placeholder="Panjang" />
                                @error('panjang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="lebar">Lebar</label>
                                <input name="lebar" id="lebar" class="form-control @error('lebar') is-invalid @enderror" type="text" placeholder="Lebar" />
                                @error('lebar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="tinggi">Tinggi</label>
                                <input name="tinggi" id="tinggi" class="form-control @error('tinggi') is-invalid @enderror" type="text" placeholder="Tinggi" />
                                @error('tinggi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="fire_rating">Fire Rating</label>
                                <input name="fire_rating" id="fire_rating" class="form-control @error('fire_rating') is-invalid @enderror" type="text" placeholder="Fire Rating" />
                                @error('fire_rating')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="media">Media</label>
                                <input name="media" id="media" class="form-control @error('media') is-invalid @enderror" type="text" placeholder="Media" />
                                @error('media')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input name="type" id="type" class="form-control @error('type') is-invalid @enderror" type="text" placeholder="Type" />
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="kapasitas">Kapasitas</label>
                                <input name="kapasitas" id="kapasitas" class="form-control @error('kapasitas') is-invalid @enderror" type="text" placeholder="Kapasitas" />
                                @error('kapasitas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="kelas_kebakaran">Kelas Kebakaran</label>
                                <input name="kelas_kebakaran" id="kelas_kebakaran" class="form-control @error('kelas_kebakaran') is-invalid @enderror" type="text" placeholder="Kelas Kebakaran" />
                                @error('kelas_kebakaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="tabung_silinder">Tabung Silinder</label>
                                <input name="tabung_silinder" id="tabung_silinder" class="form-control @error('tabung_silinder') is-invalid @enderror" type="text" placeholder="Tabung Silinde" />
                                @error('tabung_silinder')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            
            
        </div>
    </div>
</div> 
@endsection

