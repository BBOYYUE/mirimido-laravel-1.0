<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
class test extends Controller
{
    //

    function index($method){
        switch($method){
            case 'time':
                return view('test\time');
        }
    }
    function time(Request $request){
        $a = $request->input('time');
        $b = $request->input('date');
        //var_dump(Carbon::parse($b));
        if(!empty($a)) 
            return  response()->json(['time'=>Carbon::createFromTimestamp($a)->toDateTimeString()])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        elseif(!empty($b))
            return  response()->json(['time'=>strtotime($b)])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        
    }
}
