<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReturningController extends Controller
{
    public function index()
    {
        return view('return.return');
    }
}
