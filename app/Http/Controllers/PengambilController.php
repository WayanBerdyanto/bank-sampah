<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengambilController extends Controller
{
    public function index() {
        return view("pengambil.index");
    }
}
