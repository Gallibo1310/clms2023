<?php

namespace App\Http\Controllers;
use App\Models\Apparatus;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ApparatusController extends Controller
{
    public function index()
    {
        $apparatus = Apparatus::with('category')->get();

        if(! Session::has('addeditems'))
        {
            Session::put('addeditems', array('-1'));
            Session::put('qty', array('-1'));
        }
        return view('admin.home' , ['Apparatus' => $apparatus]);
    }
    public function addpage()
    {
        $apparatus = Apparatus::all();
        $categories = Category::all();
        return view('admin.apparatus.insert' ,['Apparatus' => $apparatus , 'Categories' => $categories]);
    }
    public function store(Request $request)
    {
        $apparatus = new Apparatus();
        $apparatus->category_id = $request->category;
        $apparatus->name = $request->name;
        $apparatus->qty = $request->qty;
        $apparatus->borrowed = 0;
        $apparatus->available = $request->qty;
        $apparatus->location = $request->location;
        $apparatus->description = $request->description;
        $apparatus->status ='Available';
        $apparatus->dateregistered = date('Y-m-d');
        $apparatus->save();

        return back()->with('message' , 'New Apparatus Added.');

    }
}
