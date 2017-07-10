<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;


class InputController extends Controller
{
    //
    function returnWord(Request $request){
    	$temp = $request->input("wordInput");
    	$rootWord = $this->returnRootWord($temp);

    	$theWord = [
    		'word' => $temp,
    		'rootWord' => $rootWord
    	];

    	return view('word',$theWord);
    	//return $request->input("wordInput");
    }

    function returnRootWord(String $word){
		
		$rootWord = $word;	

		//Remove suffixes
    	$suffixes=DB::table('Suffixes')->select('suffix')->get();
		$inSuffix= [];
    	foreach ($suffixes as $suffix) {
    		$suffix = substr($suffix->suffix, 1);
    		if (ends_with($word,$suffix)) {
    			$inSuffix = $suffix;
    		}
    	}
    	//echo $inSuffix;
    		//trim Word
    		

			$count = strlen($inSuffix);
			$rootWord = substr($word, 0, -1*$count);
    		
	   		
    		
	    	


   		//Remove prefixes
    	$prefixes=DB::table('Prefixes')->select('prefix')->get();
		$inPrefix= [];
    	foreach ($prefixes as $prefix) {
    		$prefix =  substr($prefix->prefix, 0, -1);
    		if (starts_with($word,$prefix)) {
    			$inPrefix = $prefix;
    			
    		}
    	}
    		
	    	

    	/*//Remove infixes
    	$infixes=DB::table('Infixes')->select('infix')->get();
		$inInfix= [];
    	foreach ($infixes as $infix) {
    		$infix =  substr($infix->infix, 1);
    		$infix =  substr($infix->infix, 0, -1);
    		if (str_contains($word,$infix)) {
    			$inInfix = $infix;
    		}
    	}*/

    	//echo $inPrefix + '\n';
    	//echo $inSuffix + '\n';
    	//echo $inInfix + '\n';

    	return $rootWord;
    }

    
    	
}
