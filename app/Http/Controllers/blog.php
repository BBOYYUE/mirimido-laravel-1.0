<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Project\Blog\blogCore;
use \App\Format\format;

class blog extends Controller
{
    //
   function index($type,blogCore $blog,format $format){
       $blog->getBlog($format);
       return view('Blog/showdir')->with('data',$format->getHtml());
   }
   function showUserDir($type,blogCore $blog ,format $format){
       $blog->getUserDir($format);
       return view('Blog/showdir')->with('data',$format->getHtml());
   }
   function showUserFile($type,Request $request,blogCore $blog,format $format){
       $blog->getDirFile($request,$format);
       return view('Blog/showfile')->with('data',$format->getHtml());
   }
   function showUserHtml($type,Request $request,blogCore $blog,format $format){
       $blog->getDirHtml($request,$format);
       return view('Blog/showhtml')->with('data',$format->getHtml());
   }
   function createDir($type,Request $request,blogCore $blog ,format $format){
       $blog->createDir($request,$format);
       return $format->getHtml();
   }
   function createFile($type,Request $request,blogCore $blog ,format $format){
       $blog->createFile($request,$format);
       return $format->getHtml();
   }
   function showMd($type,Request $request,blogCore $blog,format $format){
       $blog->showMd($request,$format);
       return view('Blog/showmd')->with('data',$format->getHtml());
   }
   function showHtml($type,Request $request,blogCore $blog,format $format){
       $blog->showHtml($request,$format);
       return view('Blog/html')->with('data',$format->getHtml());
   }
   function updateFile($type,Request $request,blogCore $blog,format $format){
       $blog->updateFile($request,$format);
       return $format->getHtml();
   }
}
