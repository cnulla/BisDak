<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    //
    function returnWord(Request $request){
    	//$request = $request->input("wordInput");
    	//return view('welcome',compact('request'))
    	return $request->input("wordInput");
    }
}
