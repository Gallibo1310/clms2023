<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test() {
       return $borrowings= Borrowing::with(['borrowers' => function($borrower) {
            $borrower->with(['student:id,firstname,lastname'])->get();
       }])->get();
    }
}
