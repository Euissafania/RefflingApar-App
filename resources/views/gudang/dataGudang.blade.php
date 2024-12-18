@extends('layouts.index')
@section('content')

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @elseif(session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
          @endif
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <div class="row">
                        <div class="col-lg-11">
                            <h4 class="text-blue h4">Data Gudang</h4>
                        </div>
                        <div class="col-lg-1">
                        <a href="{{ url('/gudang/create') }}" type="button" class="btn btn-primary"> Create </a>
                        </div>
                    </div>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">No</th>
                                <th>Nama Perusahaan</th>
                                <th>Lokasi</th>
                                <th>Provinsi</th>
                                <th>Kabupaten</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)   
                                <tr>
                                    <td class="table-plus">{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_perusahaan }}</td>
                                    <td>{{ $data->location }}</td>
                                    <td>{{ $data->provinsi->nama_provinsi }}</td>
                                    <td>{{ $data->kabupaten->nama_kabupaten }}</td>
                                    <td>{{ $data->status }}</td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div>
    </div>
</div>
@endsection