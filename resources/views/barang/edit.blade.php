@extends('layouts.app')
@section('index_show', 'show')
@section('index', 'active')
@section('barang', 'active')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Barang</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="{{ route('barang.update', $barang->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-header py-3">
                <a href="{{ route('barang') }}" class="btn btn-warning btn-sm"><i class="fas fa-chevron-left"></i> Kembali</a>
                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <label for="nama_barang">Nama</label>
                        <input value="{{ $barang->nama_barang }}" name="nama_barang" type="text" class="form-control"
                            placeholder="Masukkan nama barang" required>
                        <br>
                        <label for="">Kategori</label>
                        <select name="kategori_id" class="form-control">
                            <option value="{{ $barang->kategori_id }}">{{ $barang->kategori->nama_kategori }}</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                        <br>
                        <label for="harga_barang">Harga</label>
                        <input value="{{ $barang->harga_barang }}" name="harga_barang" type="text" class="form-control"
                            placeholder="Masukkan harga barang" required>
                        <br>
                        <label for="foto">Foto</label>
                        <img src="{{ Storage::url($barang->foto) }}" alt="" style="width: 100px;"> <br> <br>
                        <input name="foto" type="file" class="form-control-file" value="{{ $barang->foto }}">
                        <br>
                        <small class="text-danger">
                            Pastikan file anda ( jpg,jpeg,png ) !!!
                        </small>
                    </div>
                </div>
            </div>
        </form>

    </div>

@endsection
