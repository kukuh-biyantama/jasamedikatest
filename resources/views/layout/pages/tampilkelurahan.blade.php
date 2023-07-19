@extends('layout.main')

@section('utama')
<div class="bg-ghost-white" style="margin-top: 10%;">
    <div class="container-xxl">
        <h1 style="text-align: center;">Data Kelurahan</h1>
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
<a href="{{ route('input_kelurahan') }}" class="btn btn-primary" style="margin-bottom: 5%;">Input Data Kelurahan</a>
<table id="table" class="display">
    <thead>
        <tr>
            <th>ID Kelurahan</th>
            <th>Nama Kelurahan</th>
            <th>Nama Kecamatan</th>
            <th>Nama Kota</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->nama_kelurahan}}</td>
            <td>{{ $user->nama_kecamatan }}</td>
            <td>{{ $user->nama_kota }}</td>
            <td>
                <a href="/datakelurahan/{{ $user->id }}/edit" class="badge bg-warning border-0">Edit</a>
                <form action="/deletekelurahan/{{ $user->id }}" method="post" class="d-inline">
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