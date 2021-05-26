<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\answer;
use App\Models\question;
use App\Models\student;
use App\Models\result;

class quizattempt extends Controller
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
        return view('attempt',compact('q','a'));
    }
    public function indexshow()
    {
        $q=question::all();
        $a=answer::all();
        return view('showing',compact('q','a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attempt');
    }
    public function createshow()
    {
        return view('showing');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $q=question::all();
        $a=answer::all();
        //$s=student::find($id);
        $n=count($q);
        $x=0;
        for($i=0; $i<$n; $i++)
        {   
          
            $c=($a[$i]->ans);
            // echo $c;
            //echo "<br>";
            //print_r( $request->get('ans'));
            //echo in_array($c,$request->get('ans'));
            if(in_array($c,$request->get('ans')) )
	        {
		        $x=$x+1;
	        }
           
        }
        //echo $x;
        $r=new result();
        $r->s_name=session('sname')->name;//instead of somu current student's name who is attending the quiz.
        $r->result=$x;
        $r->save();  
        //return view('correct',compact('question')); 
        return view('mark',compact('r','q','a'));
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
