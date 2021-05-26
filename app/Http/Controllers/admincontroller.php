<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\answer;
use App\Models\question;
use App\Models\student;
use App\Models\result;
use App\Models\userlog;

class admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q=question::all();
        $a=answer::all();
        // $s=student::all();
        // return view('studentview',compact('s'));
        return view('questionview',compact('q','a'));
        
    }
    public function indexstud()
    {
        
        $s=student::all();
        return view('studentview',compact('s'));
        
        
    }
    public function indexres()
    {
        
        $s=result::all();
        return view('resultview',compact('s'));
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addquestion');
    }
    public function createsea()
    {
        return view('resultreport');
    }
    public function createad()
    {
        return view('adminadd');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addad(Request $request)
    {
        $getname=request('name');
        $getemail=request('email');
        $getpass=request('password');
        
        $u=new userlog();

        $u->name=$getname;
        $u->mailid=$getemail;
        $u->password=$getpass;
        $u->usertype="admin";

        $u->save();

        //echo "success";
        return redirect("/");

    }
    public function store(Request $request)
    {
      
        $getque=request('que');
        $getop1=request('op1');
        $getop2=request('op2');
        $getop3=request('op3');
        $getop4=request('op4');
        $getans=request('ans');
       
        //echo "Successfully added";

        $q=new question();
        $a=new answer();
       // $pt=new pointModel(); 
        $q->question=$getque;
        //$a->q_id=$q->id;
        $a->op1=$getop1;
        $a->op2=$getop2;
        $a->op3=$getop3;
        $a->op4=$getop4;
        $a->ans=$getans;
        
        // $pt->choice="";
    

        $a->save();

        $q->save();
        echo "<script>alert('Success.. Question Added.....');window.location='/questionadd';</script>"; 
    
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
        $q=question::find($id);
        $a=answer::find($id);
        return view('editview',compact('q','a'));
        
    }
    public function search(Request $request)
    {
        $getdate=request('sdate');
       // echo $getdate;

        $r=result::query()->where('created_at','<=',"$getdate")->get();

        //echo $r;
        return view('resultreport',compact('r'));
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
        $getque=request('que');
        $getans=request('ans');
        $getop1=request('op1');
        $getop2=request('op2');
        $getop3=request('op3');
        $getop4=request('op4');
       
        //echo "Successfully added";

        $q=question::find($id);
        $a=answer::find($id);
       // $pt=new pointModel(); 
        $q->question=$getque;
        // $a->q_id=$q->id;
        $a->op1=$getop1;
        $a->op2=$getop2;
        $a->ans=$getans;
        $a->op3=$getop3;
        $a->op4=$getop4;
        // $pt->choice="";
       


        $a->save();

        $q->save();
        return redirect ('/viewquestion');

    }
    public function deleteview($id)
    {
        $q=question::find($id);
        $a=answer::find($id);

        return view('deleteview',compact('q','a'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question=question::find($id);
        $answer=answer::find($id);

        $question->delete();
        $answer->delete();

        return redirect ('/viewquestion');
    }
}
