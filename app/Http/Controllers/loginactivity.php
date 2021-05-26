<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\faculty;
use App\Models\userlog;
class loginactivity extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index');
    }
    public function check(Request $request)
    {
        $getmail=request('mail_id');
        $getpass=request('password');
        $this->validate($request, [
            
            'mail_id'=>'required',
            'password'=>'required '

           ]);
        //$name=$request->input();
        // $request->session()->put('sname',$getmail);
        // echo session('sname');
        $u=userlog::select('mailid')->where('mailid','like',"$getmail")->first();
        
        if(!$u)
        {
            //$mes="Invalid user";
            echo "<script>alert('Invalid user Try again...');window.location='/'; </script>"; 
          // return redirect('/');
        }
        else
        {
        //echo $u->mailid;
        $p=userlog::select('password')->where('mailid','like',"$u->mailid")->first();
        //echo $p->password;
        
        
            if($p->password == $getpass)
            {
                $ut=userlog::select('usertype')->where('mailid','like',"$u->mailid")->first();
                //echo $ut->usertype;
                if($ut->usertype == 'student')
                {
                    $i=student::select('name','id')->where('email','like',"$getmail")->first();
                    $request->session()->put('sname',$i);
                    // echo session('sname')->id;
                    // echo "student";
                    return redirect ('/scheduleview');
                }
                else if($ut->usertype=='faculty')
                {
                    
                    $i=faculty::select('name','id')->where('mailid','like',"$getmail")->first();
                    $request->session()->put('sname',$i);
                    //echo "faculty";
                    // $i=faculty::select('id')->where('mailid','like',"$getmail")->first();
                    // echo $i;
                    return redirect('/questionadd');
                
                }
                else
                {
                    $request->session()->put('sname','admin');
                    return redirect('/facultyadd');
                    //echo "admin";
                }
            }
            else
            {
                echo "<script>alert('Invalid user password Try again.....');window.location='/';</script>"; 
                //return redirect('/');
            }
        }
        //return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
