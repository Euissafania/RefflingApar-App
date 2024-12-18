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
            <form method="POST" action="{{ route('gudang.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="provinsi">Provinsi:</label>
                    <select name="id_provinsi" id="provinsi" class="form-control @error('id_provinsi') is-invalid @enderror" >
                        <option value="">Pilih Provinsi</option>
                        @foreach($provinsi as $prov)
                            <option value="{{ $prov->id_provinsi }}">{{ $prov->nama_provinsi }}</option>
                        @endforeach
                    </select>
                    @error('id_provinsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="kabupaten">Kabupaten:</label>
                    <select name="id_kabupaten" id="kabupaten" class="form-control @error('id_kabupaten') is-invalid @enderror">
                        <option value="">Pilih Kabupaten</option>
                    </select>
                    @error('id_kabupaten')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="location">Location:</label>
                    <textarea name="location" id="location" class="form-control @error('location') is-invalid @enderror"></textarea>
                    @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="">Pilih Status</option>
                        <option value="0">Penuh</option>
                        <option value="1">Beroperasi</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan:</label>
                    <input name="nama_perusahaan" id="nama_perusahaan" class="form-control @error('nama_perusahaan') is-invalid @enderror" type="text" placeholder="Nama Perusahaan" />
                    @error('nama_perusahaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror"></textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="Phone Number" />
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input name="email" id="email" class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
    </div>
</div> 
@endsection

