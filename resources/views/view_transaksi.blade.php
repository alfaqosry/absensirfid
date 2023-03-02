@extends('layouts.app')
@section('transaksi','active')
@section('content')
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
                    @if(session('sukses'))
                    <div class="alert alert-success" role="alert">
                            {{session('sukses')}}
                    </div>
                    @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <i class="fas fa-fw fa-chart-area"></i> 
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Pembeli</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Foto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transaksi as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->user->name}}</td>
                                            <td>{{$item->barang->nama_barang}}</td>
                                            <td>{{$item->barang->harga_barang}}</td>
                                            <td><img src="{{Storage::url($item->barang->foto)}}" alt=''style="width: 100px;"></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

@endsection