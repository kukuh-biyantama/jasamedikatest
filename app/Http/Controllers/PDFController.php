<?php

namespace App\Http\Controllers;

use App\Models\TableDataPasien;
use PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $requestdata = $request->id;
        $data = TableDataPasien::find($requestdata);
        $datakelurahan =  TableDataPasien::with('kelurahan')->find($requestdata);
        $pdf = PDF::loadview('pdf.template', compact('data', 'datakelurahan'));
        return $pdf->download('data_pasien.pdf');
    }
}
