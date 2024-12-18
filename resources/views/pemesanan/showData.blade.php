@extends('layouts.index')
@section('content')

@php  
   if($data->product_care_type == 1){
        $type = 'Picked';
    }else{
        $type = 'Delivered';
    }

    switch ($data->payment_method) {
        case 1: 
            $paymentMethod = 'Transfer Bank'; 
            break;
        case 2: 
            $paymentMethod = 'Kartu Kredit'; 
            break;
        case 3: // E-wallet
            $paymentMethod = 'E-wallet'; 
            break;
        default:
            $paymentMethod = 'Status tidak valid'; 
            break;
    }
    $paymentStatus = 'Status tidak diketahui';                   
    switch ($data->payment_status) {
        case 1:
            $paymentStatus = 'Menunggu konfirmasi'; 
            break;
        case 2:
            $paymentStatus = 'Pembayaran berhasil'; 
            break;
        case 3: 
            $paymentStatus = 'Pembayaran berhasil'; 
            break;
        default:
            $paymentStatus = 'Status tidak valid'; 
            break;
    }
    if ($data->product_care_status == 0) {
        $status = '<span class="badge text-bg-info">Diajukan</span>';
    } elseif($data->product_care_status == 1) {
        $status = '<span class="badge text-bg-warning">Proses</span>';
    }else{
        $status = '<span class="badge text-bg-success">Selesai</span>';
    }
@endphp

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">History Pemesana</h4>
                </div>
            </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <p><strong>Customer Name</strong></p>
                        <p>{{ $data->customer_name }}</p>
                    </div>
                    <div>
                        <p><strong>Phone Number</strong></p>
                        <p>{{ $data->phone_number}}</p>
                    </div>
                    <div>
                        <p><strong>Product</strong></p>
                        <p>{{ $data->name}}</p>
                    </div>
                    <div>
                        <p><strong>Nama Perusahaan</strong></p>
                        <p>{{ $data->nama_perusahaan}}</p>
                    </div>
                    <div>
                        <p><strong>Alamat</strong></p>
                        <p>{{ $data->alamat}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <p><strong>Product Care Date</strong></p>
                        <p> {{\Carbon\Carbon::parse($data->product_care_date)->format('d-m-Y')}}</p>
                    </div>
                    <div>
                        <p><strong>Product Care Type</strong></p>
                        <p> {{ $type }}</p>
                    </div>
                    <div>
                        <p><strong>Total Pembayaran</strong></p>
                        <p>{{ 'Rp ' . number_format($data->total, 0, ',', '.') }}</p>
                    </div>
                    <div>
                        <p><strong>Payment Method</strong></p>
                        <p>{{ $paymentMethod}}</p>
                    </div>
                    <div>
                        <p><strong>Payment Status</strong></p>
                        <p>{{ $paymentStatus}}</p>
                    </div>
                    <div>
                        <p><strong>Status Transaksi</strong></p>
                        <p>{!! $status !!}</p>
                    </div>
                </div>
            </div>
        <a href="{{ url('pemesanan') }}" class="btn btn-primary"> Back</a>
        </div>
        </div>
    </div>
</div> 
@endsection






