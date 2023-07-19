<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableDataPasien;
use App\Models\TableDataKelurahan;

class DatapasienController extends Controller
{
    //
    public function index()
    {
        $data = TableDataPasien::with('kelurahan')->get();
        return view('layout.pages.tampilpasien', compact('data'));
    }

    public function create()
    {
        return view('layout.pages.registerpasien', [
            'kelurahan' => TableDataKelurahan::orderBy('nama_kelurahan', 'asc')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kelurahan_id' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
        ]);
        // Create the new TableDataPasien record
        TableDataPasien::create($request->all());

        return redirect()->route('register_datapasien')->with('success', 'Pasien data has been saved successfully.');
    }

    public function edit($id)
    {
        $data = TableDataPasien::with('kelurahan')->find($id);
        $kelurahan = TableDataKelurahan::orderBy('nama_kelurahan', 'asc')->get();
        return view('layout.pages.edit.editdatapasien', compact('data', 'kelurahan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kelurahan_id' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
        ]);
        $pasien = TableDataPasien::findOrFail($id);
        $pasien->update($request->all());
        return redirect()->route('index_datapasien')->with('success', 'Data Pasien has been updated successfully.');
    }

    public function destroy($id)
    {
        $pasien = TableDataPasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('index_datapasien')->with('success', 'Data Pasien has been deleted successfully.');
    }
}
