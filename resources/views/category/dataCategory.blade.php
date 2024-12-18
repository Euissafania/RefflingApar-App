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
                            <h4 class="text-blue h4">Data Categories</h4>
                        </div>
                        <div class="col-lg-1">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Create</button>
                             <!-- Modal Tambah Data -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Category</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('category.store') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name_category" class="form-label">Nama Kategori</label>
                                                <input type="text" class="form-control @error('name_category') is-invalid @enderror" placeholder="Masukkan Nama Kategori" name="name_category" id="name_category" required>
                                                @error('name_category')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Create</button>
                                            </div>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            {{-- end Modal --}}
                        </div>
                    </div>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">No</th>
                                <th>Nama Kategori</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)   
                                <tr>
                                    <td class="table-plus">{{ $loop->iteration }}</td>
                                    <td>{{ $data->name_category }}</td>
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
                                            <div
                                                class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                                            >
                                                <a class="dropdown-item" href="#"
                                                    ><i class="dw dw-eye"></i> View</a
                                                >
                                                <a class="dropdown-item" href="#"
                                                    ><i class="dw dw-edit2"></i> Edit</a
                                                >
                                                <a class="dropdown-item" href="#"
                                                    ><i class="dw dw-delete-3"></i> Delete</a
                                                >
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection