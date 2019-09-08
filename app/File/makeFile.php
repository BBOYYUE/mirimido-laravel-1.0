<?php 
namespace App\File;
use Illuminate\Support\Facades\Storage;

// 此类负责生成一个文件，并把文件保存到文件表
class makeFile{

    function __construct(){
        $this->user = \Auth::user();
        $this->file = new \App\file;
    }

    function makefile($typeeof='tmp',$file,$filename,$content){

        $url = 'public/'.$typeeof.'/'.$file;
        $file = Storage::put($url,$content);
        $this->file->create(
            [
                'name'=>$filename,
                'url'=>$url,
                'created_at'=>time(),
            ]
        );
        return ['id'=>$this->file->where('url',$url)->select('id')->first()->id,'url'=>$url];
    }
    
}