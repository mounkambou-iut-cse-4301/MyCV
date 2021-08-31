<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $pdf = PDF::loadView('preview');    
        return $pdf->download('demo.pdf');
    }
}
