<?php

namespace App\Http\Controllers;

//import model produk
use App\Models\ProdukModel;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function cetak()
    {
        // harus berupa array
        $produkModel = ProdukModel::all()->toArray();
        $pdf = Pdf::loadView('pdf.index', [ 'produkModel' => $produkModel]);

        // tampilkan
        return $pdf->stream('data_produk.pdf');
    }
}
