@extends('layouts.index')
@section('content')

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Create Data Pemesanan</h4>
                </div>
            </div>
          
            <form method="POST" action="{{ route('pemesanan.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer_name">Nama Customer</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                        </div>
                
                        <div class="form-group">
                            <label for="phone_number">Nomor Telepon</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                        </div>
                
                        <div class="form-group">
                            <label for="product">Pilih Produk</label>
                            <select name="product_id" id="product" class="form-control @error('product') is-invalid @enderror" required>
                                <option value="">Pilih Produk</option>
                                @foreach($products as $data)
                                    <option value="{{ $data->id }}" data-price="{{ $data->price }}" {{ old('product') == $data->id ? 'selected' : '' }}>
                                        {{ $data->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="gudang_id">Pilih Lokasi Gudang Terdekat</label>
                            <select class="form-control" id="gudang_id" name="gudang_id" required>
                                @foreach($gudang as $warehouse)
                                    <option value="">Pilih Lokasi</option>
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->nama_perusahaan }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="latitude_pickup">Latitude Pickup</label>
                            <input type="text" id="latitude" name="latitude_pickup" class="form-control @error('latitude_pickup') is-invalid @enderror" required>
                            @error('latitude_pickup')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="longitude_pickup">Longitude Pickup</label>
                            <input type="text" id="longitude" name="longitude_pickup" class="form-control @error('longitude_pickup') is-invalid @enderror" required>
                            @error('longitude_pickup')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
            
                        <!-- Map -->
                        <div class="form-group">
                            <label for="map">Pick Location on Map</label>
                            <div id="map" style="height: 200px;"></div>
                        </div>
                   
                    </div>
            
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product_care_date">Pilih Tanggal Refill</label>
                            <input type="datetime-local" class="form-control" id="product_care_date" name="product_care_date" required>
                        </div>
                
                        <div class="form-group">
                            <label for="payment_method">Metode Pembayaran</label>
                            <select class="form-control" id="payment_method" name="payment_method" required>
                                <option value="">Pilih Method Payment</option>
                                <option value="1">Transfer Bank</option>
                                <option value="2">Kartu Kredit</option>
                                <option value="3">E-wallet</option>
                            </select>
                        </div>
               
                        <div class="form-group">
                            <label for="product_care_type">Jenis Layanan</label>
                            <select class="form-control" id="product_care_type" name="product_care_type" required>
                                <option value="">Pilih Jenis Layanan</option>
                                <option value="1">Picked</option>
                                <option value="2">Delivered</option>
                            </select>
                        </div>
                
                        <div class="form-group">
                            <label for="total">Total Pembayaran</label>
                            <input type="text" id="formatted-total" class="form-control @error('total') is-invalid @enderror" value="{{ old('total') }}" readonly>
                            <input type="hidden" id="total" name="total">
                            @error('total')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="product_care_status">Status Transaksi</label>
                            <input type="text" name="product_care_status" id="total" class="form-control @error('product_care_status') is-invalid @enderror" value="proses" readonly >
                        </div>
                
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div> 
@endsection






