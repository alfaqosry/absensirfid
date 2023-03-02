@extends('layouts.app')
@section('index_show','show')
@section('index','active')
@section('barang','active')
@section('content')
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Barang</h1>
                    @if(session('sukses'))
                    <div class="alert alert-success" role="alert">
                            {{session('sukses')}}
                    </div>
                    @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{route('barang.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name Barang</th>
                                            <th>Kategori Barang</th>
                                            <th>Harga</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($barang as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->nama_barang}}</td>
                                            <td>{{$item->kategori->nama_kategori}}</td>
                                            <td>{{$item->harga_barang}}</td>
                                            <td><img src="{{Storage::url($item->foto)}}" alt=''style="width: 100px;"></td>
                                            <td>
                                                <a href="{{route('barang.edit', $item->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="{{route('barang.delete', $item->id)}}" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Hapus Data ?')"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

@endsection