<?php
// app/Http/Controllers/KelurahanController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableDataKelurahan;

class KelurahanController extends Controller
{
    public function index()
    {
        $data = TableDataKelurahan::all();
        return view('layout.pages.tampilkelurahan', compact('data'));
    }
    public function create()
    {
        return view('layout.pages.datakelurahan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelurahan' => 'required|string|max:255',
            'nama_kecamatan' => 'required|string|max:255',
            'nama_kota' => 'required|string|max:255',
        ]);
        $existingKelurahan = TableDataKelurahan::where('nama_kelurahan', $request->nama_kelurahan)->first();

        if ($existingKelurahan) {
            return redirect()->route('input_kelurahan')->with('error', 'Kelurahan already exists in the database.');
        }
        TableDataKelurahan::create($request->all());

        return redirect()->route('input_kelurahan')->with('success', 'Kelurahan data has been saved successfully.');
    }

    public function edit($id)
    {
        $data = TableDataKelurahan::find($id);
        return view('layout.pages.edit.editdatakelurahan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelurahan' => 'required|string|max:255',
            'nama_kecamatan' => 'required|string|max:255',
            'nama_kota' => 'required|string|max:255',
        ]);
        $pasien = TableDataKelurahan::findOrFail($id);
        $pasien->update($request->all());
        return redirect()->route('index_datakelurahan')->with('success', 'Data Pasien has been updated successfully.');
    }

    public function destroy($id)
    {
        $pasien = TableDataKelurahan::findOrFail($id);
        $pasien->delete();

        return redirect()->route('index_datapasien')->with('success', 'Data Pasien has been deleted successfully.');
    }
}
