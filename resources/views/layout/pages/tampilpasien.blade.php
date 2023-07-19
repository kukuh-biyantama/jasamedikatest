@extends('layout.main')

@section('utama')
<div class="bg-ghost-white" style="margin-top: 10%;">
    <div class="container-xxl">
        <h1 style="text-align: center;">Silahkan Registrasi Pasien Disini</h1>
    </div>
    <!-- /.container -->
</div>
@stop
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<a href="{{ route('register_datapasien') }}" class="btn btn-primary" style="margin-bottom: 5%;">Register Pasien</a>
<table id="table" class="display">
    <thead>
        <tr>
            <th>ID Pasien</th>
            <th>Nama Pasien</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Kelurahan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->nama_pasien }}</td>
            <td>{{ $user->jenis_kelamin }}</td>
            <td>{{ $user->alamat }}</td>
            <td>{{ $user->kelurahan->nama_kelurahan }}</td>
            <td>
                <a href="/datapasien/{{ $user->id }}/edit" class="badge bg-warning border-0">Edit</a>
                <form action="/generate_pdf" method="POST" class="d-inline" target="_blank">
                    @csrf
                    <input type='hidden' name='id' value='{{ $user->id }}'>
                    <button class="badge bg-primary border-0" onclick="return confirm('Cetak Kartu?')">Cetak
                        Kartu</button>
                </form>

                <form action="/deletepasien/{{ $user->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Anda Yakin?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop