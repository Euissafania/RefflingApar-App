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
                            <h4 class="text-blue h4">Data History Product</h4>
                        </div>
                    </div>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">No</th>
                                <th>Nama Product</th>
                                <th>Jumlah Reffling</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                               @if($data->reffling_count_data >= 1)
                                <tr>
                                    <td class="table-plus">{{ $loop->iteration }}</td>
                                    <td> {{ $data->product->name  }}</td>
                                    <td>{{ $data->reffling_count_data}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                href="#"
                                                role="button"
                                                data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="{{ url('produkReffling/' . $data->product->id) }}">
                                                    <i class="dw dw-eye"></i> View
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection