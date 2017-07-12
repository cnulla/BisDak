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
    	$data= $this->returnRootWord($temp);


    	$theWord = [
    		'word' => $temp,
    		'rootWord' => $data['rootWord'],
    		'prefix' => $data['prefixes'],
    		'suffix' => $data['suffixes'],
    		'infix' => $data['infixes']
    	];

    	return view('word',$theWord);
    	//return $request->input("wordInput");
    }

    function returnRootWord(String $word){
		
		$rootWord = $word;	
		$tempRootWord = array(); //contains list of all possible words

		//Remove suffixes
		$inSuffix = array();
    	$suffixes=DB::table('Suffixes')->select('suffix')->get();
    	foreach ($suffixes as $suffix) {
    		$suffix= str_replace("-", "", $suffix->suffix);

    		if (ends_with($word,$suffix)) {
    			$inSuffix[] = $suffix; //inSuffix holds all possible suffixes
    		}
    	}
    		//append to tempRootWord all possible words without suffixes
    		foreach ($inSuffix as $suffix) {
    			$count = strlen($suffix);
				$tempRootWord[] = substr($rootWord, 0, -1*$count);
    		}

   		//Remove prefixes
		$inPrefix = array();
    	$prefixes=DB::table('Prefixes')->select('prefix')->get();
    	foreach ($prefixes as $prefix) {
    		$prefix = str_replace("-", "", $prefix->prefix);
    		if (starts_with($rootWord,$prefix)) {
    			$inPrefix[] = $prefix;
    		}
    	}
    		//append to tempRootWord all possible words without prefixes
    		foreach ($inPrefix as $prefix) {
    			$count = strlen($prefix);
				$tempRootWord[] = substr($rootWord, $count);
    		}
    		//append to tempRootWord all possible words without prefixes and suffixes
    		foreach ($tempRootWord as $temp) {
    			foreach ($inSuffix as $suffix) {
    				$count = strlen($suffix);
					$tempRootWord[] = substr($temp, 0, -1*$count);
    			}
    		}
    		
    	//Remove infixes
    	$inInfix = array();
    	$infixes=DB::table('Infixes')->select('infix')->get();
    	foreach ($infixes as $infix) {
    		$infix = str_replace("-", "", $infix->infix);
    		foreach ($tempRootWord as $temp) { ////append to tempRootWord all possible words w/o infix
    			if (str_contains($temp,$infix)) {
	    			$inInfix[] = $infix;
	    			$tempRootWord[] = str_replace($infix, "", $temp);
	    		}
    		}
    	}
    		
    	//insert here searching through database every element in tempRootWord array

    	$rootWord  = 'temp sa';
    	foreach ($tempRootWord as $key) {
    		echo $key; echo ' ';
    	}

		$data = [
    		'rootWord' => $rootWord,
    		'infixes' => $inInfix,
    		'prefixes' => $inPrefix,
    		'suffixes' => $inSuffix,
    	];

    	return $data;
    }

    
    	
}
