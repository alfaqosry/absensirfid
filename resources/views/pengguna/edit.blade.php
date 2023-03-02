@extends('layouts.app')
@section('user', 'active')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Kategori</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="{{Route('pengguna.update', $user->id)}}" method="post">
            {{ csrf_field() }}
            <div class="card-header py-3">
                <a href="{{route('pengguna.index')}}" class="btn btn-warning btn-sm"><i class="fas fa-chevron-left"></i>
                    Kembali</a>
                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <label for="nama_kategori">Nama</label>
                        <input value="{{$user->name}}" name="name" type="text"
                            class="form-control" placeholder="" required>
                        <br>
                        <label for="nama_kategori">Role</label>
                        <input value="{{$user->role}}" name="role" type="text"
                            class="form-control" placeholder="" required>
                        <br>
                        <label for="nama_kategori">Email</label>
                        <input value="{{$user->email}}" name="email" type="text"
                            class="form-control" placeholder="" required>
                        <br>
                        <label for="nama_kategori">Password</label>
                        <input value="" name="password" type="password"
                            class="form-control" placeholder="New Password">
                        <br>
                    </div>
                </div>
            </div>
        </form>

    </div>

@endsection
