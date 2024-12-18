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
            <div class="card-box mb-30">
                <div class="pd-20">
                    <div class="row">
                        <div class="col-lg-11">
                            <h4 class="text-blue h4">Data History Pemesanan</h4>
                        </div>
                    </div>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">No</th>
                                <th>Product</th>
                                <th>Lokasi</th>
                                <th>Tanggal Reffil</th>
                                <th>Status Pembayaran</th>
                                <th>Status Transaksi</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)   
                                <tr>
                                    <td class="table-plus">{{ $loop->iteration }}</td>
                                    <td> {{  $data->product->name  }}</td>
                                    <td>{{ $data->productCare->gudang->nama_perusahaan }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($data->productCare->product_care_date)->format('d-m-Y') }}
                                    </td>
                                    @php 
                                        $paymentStatus = 'Status tidak diketahui'; // Nilai default jika payment_status tidak sesuai dengan 1, 2, atau 3
                                    
                                        switch ($data->productCare->payment_status) {
                                            case 1: // Transfer Bank
                                                $paymentStatus = 'Menunggu konfirmasi'; // Menunggu konfirmasi (pending)
                                                break;
                                            case 2: // Kartu Kredit
                                                $paymentStatus = 'Pembayaran berhasil'; // Pembayaran berhasil
                                                break;
                                            case 3: // E-wallet
                                                $paymentStatus = 'Pembayaran berhasil'; // Pembayaran berhasil
                                                break;
                                            default:
                                                $paymentStatus = 'Status tidak valid'; // Jika status tidak sesuai dengan 1, 2, atau 3
                                                break;
                                        }
                                        if ($data->productCare->product_care_status == 0) {
                                            $status = '<span class="badge text-bg-info">Diajukan</span>';
                                        } elseif($data->productCare->product_care_status == 1) {
                                            $status = '<span class="badge text-bg-warning">Proses</span>';
                                        }else{
                                            $status = '<span class="badge text-bg-success">Selesai</span>';
                                        }
                                    @endphp
                                    <td>{{ $paymentStatus }}</td>
                                    <td>{!! $status !!}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a
                                                class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                href="#"
                                                role="button"
                                                data-toggle="dropdown"
                                            >
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="{{ url('history/' . $data->productCare->id . '/edit') }}">
                                                    <i class="dw dw-edit2"></i> Konfirmasi
                                                </a>
                                            </div>
                                        </div>
                                    </td>
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