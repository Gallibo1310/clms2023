<?php

namespace App\Http\Controllers;
use App\Models\Apparatus;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Borrowing;
use App\Models\Section;
use App\Models\Systemsetting;
use App\Models\Borrower;
use App\Models\Borrowingdetail;

class BorrowingController extends Controller
{
    public function index()
    {
        $apparatus = Apparatus::all();
        return view('admin.borrowing.index' , ['Apparatus' => $apparatus]);
    }
    public function searchtext(Request $request)
    {
        if($request->search=='')
        {
            $apparatus =  Apparatus::all();
        }
        else
        {
             $apparatus =  Apparatus::where('name', 'LIKE', '%'.$request->search.'%')->get();
        }
        return response()->json($apparatus);
    }
    public function additem(Request $request)
    {
        $index = array_search($request->apparatusid,Session::get('addeditems'));
        if($index != null)
        {
            $preqty = Session::get('qty');
            $preqty[$index] += $request->apparatusqty;
            Session::put('qty',$preqty);
        }
        else
        {
            Session::push('addeditems',  $request->apparatusid);
            Session::push('qty',  $request->apparatusqty);
        }
        return back();
    }
    public function clearItems()
    {
        Session::put('addeditems', array('-1'));
        Session::put('qty', array('-1'));
        return back()->with('message', 'Items cleared.');
    }
    public function borrowing()
    {
        $students = Student::with('sections')->get();
        $apparatus = Apparatus::all();
        $sections = Section::all();
        return view('admin.borrowing.borrowing',  ['Students' => $students, 'Apparatus' => $apparatus , 'Sections' => $sections]);
    }
    public function addborrower(Request $request)
    {
        $students = Student::with('sections')->get();
        $sections = Section::all();
        $apparatus = Apparatus::all();
        if($request->borrowercat =='1') //STUDENT
        {
            if(Session::has('borrowerid'))
            {
                if(Session::get('borrowercategory' )== 'Section')
                {
                    Session::forget('borrowerid');
                    Session::put('borrowerid',array( $request->borrowerid));
                }
                else
                {
                    $index = array_search($request->borrowerid,Session::get('borrowerid'));
                    if($index === null)
                    {
                        Session::push('borrowerid' ,$request->borrowerid);
                    }
                }
            }
            else
            {
                Session::put('borrowerid' ,array($request->borrowerid) );
            }
            Session::put('borrowercategory',  'Student');
        }
        else //SECTION
        {
            Session::put('borrowercategory',  'Section');
            Session::put('borrowerid' , $request->borrowerid);
        }
        return view('admin.borrowing.borrowing' , ['Students' => $students , 'Sections' => $sections ,  'Apparatus' => $apparatus]);
    }
    public function borrowitems(Request $request)
    {
        // DB::beginTransaction();

        // try {
            //GET SETTING INFOR, GET THE CURRENT YEAR
            $setting = Systemsetting::first();
            $borrowing = new Borrowing();

            //INSERT TO BORROWING TABLE
            $borrowing->dateborrowed  = $request->dateborrowed;
            $borrowing->status  = 'Active';
            $borrowing->totalqty  = array_sum(session('qty')) +1;
            $borrowing->returnedqty  = 0;
            $borrowing->description  = $request->description;
            $borrowing->borrowingtype  = $request->type;
            $borrowing->semester  = $setting->currentsemester;
            $borrowing->year  = $setting->currentyear;
            if(session('borrowercategory') =='Section') // IF BORROWER CATEGORY IS SECTION, INSERT SECTION ID
            {
                $borrowing->section_id = session('borrowerid');


            }
            $borrowing->save();

            //IF BORROWER CATEGORY IS STUDENT, INSERT STUDENT IDs TO BORROWER TABLE
            if( session('borrowercategory') == 'Student')
            {
                for($i = 0; $i < sizeof(session('borrowerid')) ; $i++)
                {
                    $borrower  = new Borrower();
                    $borrower->borrowing_id = $borrowing->id;
                    $borrower->student_id = session('borrowerid')[$i];
                    $borrower->save();
                }
            }

            //INSERT TO BORROWING DETAILS TABLE
            for($i = 1; $i <  sizeof(session('addeditems')); $i++)
            {

                $borrowingdetail  =  new Borrowingdetail();
                $borrowingdetail->borrowing_id= $borrowing->id;
                $borrowingdetail->statusperitem = 'Borrowed';
                $borrowingdetail->apparatus_id = session('addeditems')[$i] ;
                $borrowingdetail->itemqty = session('qty')[$i] ;
                $borrowingdetail->returnedqty = 0 ;
                $borrowingdetail->save();

                //UPDATE APPARATUS AVAILABLE QTY
                $apparatusdetail = Apparatus::findorFail(session('addeditems')[$i]);
                $apparatusdetail->available = $apparatusdetail->available - session('qty')[$i];
                $apparatusdetail->borrowed  = $apparatusdetail->borrowed + session('qty')[$i];
                $apparatusdetail->update();
            }
            Session::put('addeditems', array('-1'));
            Session::put('qty', array('-1'));

            $apparatus = Apparatus::all();

            // DB::commit();

            return redirect()->route('borrowing',  ['Apparatus' => $apparatus ])->with('message' , 'Borrowing recorded');
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return redirect()->back()->with('error', 'An error occurred while recording the borrowing. Please try again later.');
        // }
    }
    public function borrowinglist()
    {
        $borrowings= Borrowing::with(['borrowers' => function($borrower) {
            $borrower->with(['student:id,firstname,lastname'])->get();
       }])->get();
        return view('admin.borrowing.borrowinglist' , ['Borrowings' => $borrowings]);
    }


}
