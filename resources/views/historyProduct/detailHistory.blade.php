@extends('layouts.index')
@section('content')

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">History Product Reffling</h4>
                </div>
            </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <div>
                        <p><strong>Nama Product</strong></p>
                        <p>{{ $data->name }}</p>
                    </div>
                    <div>
                        <p><strong>Jumlah Reffling</strong></p>
                        <p>{{ $data->reffling_count}}</p>
                    </div>
                    <div>
                        <p><strong>Location Reffling</strong></p>
                        <p>{{ $data->nama_perusahaan}}</p>
                    </div>
                </div>
                <div class="col">
                    <div>
                        <p><strong>Alamat</strong></p>
                        <p>{{ $data->alamat}}</p>
                    </div>
                    <div>
                        <p><strong>Created By</strong></p>
                        <p>{{ $data->nama_user}}</p>
                    </div>
                </div>
            </div>          
        <a href="{{ url('productReffling') }}" class="btn btn-primary"> Back</a>
        </div>
        </div>
    </div>
</div> 
@endsection






