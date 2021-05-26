<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\userlog;
use App\Models\testschedule;
use App\Models\feedback;
use App\Models\result;
use Carbon\Carbon;


class studentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $s=session('sname')->name;
        $m=result::query()->where('s_name','like',"$s")->get();
        return view('studmark',compact('m'));
    }
    public function search()
    {
       
        
        $date =Carbon::now() ;
        $curdate=$date->toDateString();
        // echo $date;
        // echo "<br>";
        // echo $curdate;
        //$currentDate = date('y-m-d', strtotime($date));   
        //echo $currentDate;
        $t=testschedule::query()->where('schedule','=',"$curdate ")->get();
        return view('listschedule',compact('t'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('studentreg');
    }
    public function createfeedback()
    {
        return view('feedbackadd');
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
        $getquali=request('qualification');
        $getpass=request('password');
        $getcpass=request('confirm_password');
       // echo "successfully added";
       $this->validate($request, [
            
        'name'=>'required',
        'email'=>'required|email',
        'phone_no'=>'required',
        'qualification'=>'required',
        'password'=>'required|min:5|max:15 ',
        'confirm_password'=>'required|min:5|max:15 '

       ]);
        if($getcpass == $getpass)
        {
            $stu=new student();
            $user= new userlog();
    
            $stu->name=$getname;
            $stu->email=$getemail;
            $stu->phone=$getphno;
            $stu->qualification=$getquali;
            $stu->password=$getpass;
            $stu->status="1";
    
    
    
            $user->name=$getname;
            $user->mailid=$getemail;
            $user->password=$getpass;
            $user->usertype="student";
    
            $stu->save();
            $user->save();
            
            if($stu && $user){
                $i=student::select('name')->where('email','like',"$getemail")->first();
                $request->session()->put('sname',$i);
                echo "<script>alert('Success.. Student Added.....');window.location='/scheduleview';</script>"; 

                
                //return redirect('/scheduleview');
            }
            else{
                echo "<script>alert('Something went Wrong.......');window.location='/';</script>"; 
            }


            
        }
        else{
            echo "<script>alert('Password is not correct......');window.location='/';</script>"; 
        }
       
    }
    public function storefeedback(Request $request)
    {
        $getcom=request('comment');

        $f=new feedback();

        $f->s_name=session('sname')->name;
        $f->comments=$getcom;

        $f->save();
        echo "<script>alert('Thank you for Feedback........');window.location='/addfeedback';</script>"; 
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
        // $s=student::find($id);
        // return view('editmeview',compact('s'));
        
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
        // $getname=request('name');
        // $getemail=request('email');
        // $getphno=request('phone_no');
        // $getquali=request('qualification');

        // $s=student::select('name')->where('id','=',"$id")->first();
        // echo $s->name;

        //  $stu=student::find($id);

        // $stu->name=$getname;
        // $stu->email=$getemail;
        // $stu->phone=$getphno;
        // $stu->qualification=$getquali;
        // $stu->status="1";


        // $u=userlog::query()->where('name','like',"$s->name");
        //  print_r($u);


        // // $user->name=$getname;
        // // $user->mailid=$getemail;
        // // $user->password=$getpass;
        // // $user->usertype="student";

        // // $stu->save();
        // // $user->save();
        // // echo updated;

    }
    public function updatestatus(Request $request,$id)
    {
        $q=student::find($id);

        $q->status="0";
        $q->save();
        return redirect ('/viewstudent');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
