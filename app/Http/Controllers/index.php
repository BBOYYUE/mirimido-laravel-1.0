<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class index extends Controller
{
    //
    function __construct(){
        $this->makefile = new \App\File\makeFile;
    }

    function index(){
        $test = $this->makefile->makefile('tmp','tmp','hellophp');
    }
}
