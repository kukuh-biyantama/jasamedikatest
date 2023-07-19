@extends('layout.main')

@section('utama')
<div class="bg-ghost-white" style="margin-top: 10%;">
    <div class="container-xxl">
        <h1 style="text-align: center;">Edit Data Kelurahan</h1>
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
<form action="{{ route('data.updatekelurahan', $data->id) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="form-outline">
        <label class="form-label" for="form6Example1">Nama Kelurahan</label>
        <input type="text" id="nama_kelurahan" name="nama_kelurahan" value="{{ $data->nama_kelurahan }}" class="form-control" />
    </div>

    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example1">Nama Kecamatan</label>
        <input type="text" id="nama_kecamatan" name="nama_kecamatan" value="{{ $data->nama_kecamatan }}" class="form-control" />
    </div>

    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example1">Nama Kota</label>
        <input type="text" id="nama_kota" name="nama_kota" value="{{ $data->nama_kota }}" class="form-control" />
    </div>
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4" style="width: 100%;">Input</button>
</form>
@stop