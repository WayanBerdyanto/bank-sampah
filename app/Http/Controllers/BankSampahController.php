<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankSampahController extends Controller
{
    public function index() {
        return view("banksampah.index");
    }

    public function dataPembuangan(){
        return view('banksampah.dataPembuangan');
    }

}
