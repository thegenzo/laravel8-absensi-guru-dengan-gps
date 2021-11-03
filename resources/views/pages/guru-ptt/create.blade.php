@extends('layout.app')

@section('title', 'Tambah Guru GTT')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Guru GTT</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4 class="card-title text-white">Tambah Guru GTT</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('guru-ptt.store') }}" method="POST">
                                @if (count($errors) > 0)
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li class="mb-1">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @csrf
                                <h3>Data Akun</h3>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                                    <small id="emailHelp2" class="form-text text-muted">Email tidak boleh sama dengan user lain</small>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                                </div>
                                <div class="form-group">
                                    <label for="konfirmasi_password">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Masukkan Konfirmasi Password">
                                </div>
                                <hr>
                                <h3>Data Profil</h3>
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                                </div>
                                <div class="form-group">
                                    <label for="name">Nomor Unik Pendidik dan Tenaga Kependidikan</label>
                                    <input type="text" class="form-control" id="nuptk" name="nuptk" placeholder="Masukkan NUPTK">
                                </div>
                                <div class="form-group">
                                    <label for="name">Nomor Induk Keluarga</label>
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK">
                                </div>
                                <div class="form-group">
                                    <label for="name">Nomor Handphone</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor Handphone">
                                </div>
                                <div class="form-group">
                                    <label for="name">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" placeholder="Masukkan Alamat"></textarea>
                                </div>
                                <a href="/guru-ptt" class="btn btn-warning">Kembali</a>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection