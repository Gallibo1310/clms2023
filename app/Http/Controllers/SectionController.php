<?php

namespace App\Http\Controllers;
use App\Models\Section;
use App\Models\Systemsetting;
use App\Models\Schoolyear;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::with('students')->get();
        $setting = Systemsetting::first();
        return view('admin.section.index' , ['Sections' => $sections , 'Settings' =>$setting]);
    }
    public function addpage()
    {
        $schoolYears = Schoolyear::all();
        $setting = Systemsetting::first();
        return view('admin.section.insert' , ['SchoolYears'  => $schoolYears, 'Settings' =>$setting]);
    }
    public function store(Request $request)
    {
        $section = new Section();
        $section->sectionname = $request->name;
        $section->description = $request->description;
        $section->year = $request->year;
        $section->semester = $request->semester;
        $section->save();

        return back()->with('message' , 'New Section Added.');
    }
}
