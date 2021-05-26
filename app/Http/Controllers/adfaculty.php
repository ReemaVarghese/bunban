<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\faculty;
use App\Models\userlog;
use App\Models\testschedule;
use App\Models\feedback;
use Carbon\Carbon;

class adfaculty extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $s=faculty::all();
        return view('facultyview',compact('s'));
    }
    public function indextest()
    {
        $s=testschedule::all();
        return view('testschview',compact('s'));
    }
    public function indexfeedback()
    {
        $s=feedback::all();
        return view('feedbackview',compact('s'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facultyreg');
    }
   public function createsch()
    {
          return view('testschedule');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getname=request('name');
        $getemail=request('email');
        $getphno=request('phone_no');
        $getcou=request('course');
        $getpass=request('password');
        $getcpass=request('confirm_password');

        //echo "successfully added";
        $this->validate($request, [
            
            'name'=>'required',
            'email'=>'required|email',
            'phone_no'=>'required',
            'course'=>'required',
            'password'=>'required|min:5|max:15 ',
            'confirm_password'=>'required|min:5|max:15 '
    
           ]);
        if($getpass == $getcpass)
        {
            $stu=new faculty();
            $user= new userlog();

            $stu->name=$getname;
            $stu->mailid=$getemail;
            $stu->phone=$getphno;
            $stu->course=$getcou;
            $stu->password=$getpass;
            $stu->status="1";



            $user->name=$getname;
            $user->mailid=$getemail;
             $user->password=$getpass;
            $user->usertype="faculty";

            $stu->save();
             $user->save();
             if($stu && $user)
             {
                echo "<script>alert('Success.. Faculty Added.....');window.location='/facultyadd';</script>"; 
             }
             else{
                echo "<script>alert('Something went Wrong.......');window.location='/facultyadd';</script>"; 
             }

        }
        else{
            echo "<script>alert('Password is not correct......');window.location='/facultyadd';</script>"; 
        }

        
        //return redirect('/facultyadd');
    }
    public function storesch(Request $request)
    {
        $getname=request('quiz_name');
        $getsch=request('schedule_date');
        //echo "successfully added";
        // $date =Carbon::now() ;
        // $curdate=$date->toDateString();
        //cho $curdate;
        $this->validate($request,[

            'quiz_name'=>'required',
            'schedule_date'=>'required|date|after_or_equal:today',


        ]);

        $stu=new testschedule();

        $stu->quizname=$getname;
        $stu->schedule=$getsch;
        $stu->save();
        
        if($stu)
        {
            echo "<script>alert('Schedule added on $getsch....');window.location='/addschedule';</script>";
        }

        //return redirect('/addschedule');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $f=faculty::find($id);
        return view('facultyedit',compact('f'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $getname=request('name');
        $getmail=request('mail');
        $getphn=request('phn');
        $getcou=request('cou');
       
        //echo "Successfully added";

        $q=faculty::find($id);
     
        $q->name=$getname;
        $q->mailid=$getmail;
        $q->phone=$getphn;
        $q->course=$getcou;
        // $pt->choice="";
       


       $q->save();
        return redirect ('/viewfaculty');

    }
    public function updatestatus(Request $request,$id)
    {
        $q=faculty::find($id);

        $q->status="0";
        $q->save();
        return redirect ('/viewfaculty');

    }

    public function deleteview($id)
    {
        $f=faculty::find($id);

        return view('facultydelete',compact('f'));
    }
    public function deletesch($id)
    {
        $f=testschedule::find($id);

        return view('testdelete',compact('f'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function destoysch($id)
    {
        $f=testschedule::find($id);
        
        $f->delete();

        return redirect ('/viewschedule');
    }
}
