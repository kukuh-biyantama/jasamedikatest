@extends('layout.main')

@section('utama')
<div class="bg-ghost-white" style="margin-top: 10%;">
    <div class="container-xxl">
        <h1 style="text-align: center;">Edit Pasien</h1>
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
<form action="{{ route('data.update', $data->id) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <!-- <input type="hidden" name="id_pasien" value=""> -->
    <div class="col">
        <div class="form-outline">
            <label class="form-label" for="form6Example1">Nama Pasien</label>
            <input type="text" id="nama_pasien" name="nama_pasien" value="{{ $data->nama_pasien}}" class="form-control" />
        </div>
    </div>

    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example3">Alamat</label>
        <textarea name="alamat" id="alamat" style="width: 100%;" value="{{ $data->alamat }}" placeholder="masukkan alamat"></textarea>
    </div>

    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">Nomor telepon</label>
        <input type="number" name="nomor_telepon" class="form-control" value="{{ $data->nomor_telepon }}" />
    </div>

    <!-- Email input -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example5">RT</label>
                <input type="number" id="rt" name="rt" class="form-control" value="{{ $data->rt }}" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example5">RW</label>
                <input type="number" id="rw" name="rw" class="form-control" value="{{ $data->rw }}" />
            </div>
        </div>
    </div>
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example6">pilih kelurahan</label>
        <select class="form-select" id="kelurahan_id" name="kelurahan_id">
            @foreach ($kelurahan as $kelurahans)
            @if (old('kelurahan_id') == $kelurahans->nama_kelurahan)
            <option class="option" value="{{ $kelurahans->id }}" selected>
                {{ $kelurahans->nama_kelurahan }}
            </option>
            @else
            <option class="option" value="{{ $kelurahans->id}}">{{ $kelurahans->nama_kelurahan }}
            </option>
            @endif
            @endforeach
        </select>
    </div>
    <!-- Number input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example6">Tanggal Lahir</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}" />
    </div>
    <!-- Message input -->
    <div class="form-outline mb-4">
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
        </select><br><br>
    </div>
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4" style="width: 100%;">Edit</button>
</form>
@stop