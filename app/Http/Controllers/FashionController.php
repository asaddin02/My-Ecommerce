<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FashionController extends Controller
{
    public function index() {
        //
    }

    public function fashion() {
        return view('fashion');
    }
}
