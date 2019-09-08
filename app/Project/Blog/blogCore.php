<?php
namespace App\Project\Blog;

use Illuminate\Support\Facades\Storage;

class blogCore{
    public  $htmlHead = '
	    <!DOCTYPE html>
	    <html>
	    <head>
    		<meta charset="utf-8">
    		<meta name="viewport" content="width=device-width, initial-scale=1">
   		    <link rel="dns-prefetch" href="//fonts.gstatic.com">
   		    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  		    <link href="https://cmfac.com/editormd/css/editormd.css" rel="stylesheet">
        </head>
        <body class="markdown-body editormd-preview-container">';
    public $htmlBody = '</body></html>';

   
    function __construct(){
        $this->userdir =new \App\userdir;
        $this->dir =new \App\dir;
        $this->file =new \App\file;
        $this->dirfile =new \App\dirfile; 
        $this->userid = \Auth::id();
        $this->makefile = new \App\File\makeFile;
    }
    function getBlog($format){
        $dirid = $this->userdir->select('dirid')->get();
        $format->data = ['dir'=>$this->dir->whereIn('id',$dirid)->get()];
        $format->code = 1;

    }
    function getUserDir($format){
        $dirid = $this->userdir->where('userid',$this->userid)->select('dirid')->get();
        $format->data = ['dir'=>$this->dir->whereIn('id',$dirid)->get(),'userid'=>$this->userid];
        $format->code = 1;
    }
    function getDirFile($request,$format){
        $fileid = $this->dirfile->where('dirid',$request->input('dirid'))->select('fileid')->get();
        $format->data = ['file'=>$this->file->whereIn('id',$fileid)->get(),'dir'=>$request->input('dir'),'dirid'=>$request->input('dirid')];
        $format->code = 1;
    }
    function getDirHtml($request,$format){
        $fileid = $this->dirfile->where('dirid',$request->input('dirid'))->select('htmlid')->get();
        $format->data = ['html'=>$this->file->whereIn('id',$fileid)->get(),'dir'=>$request->input('dir'),'dirid'=>$request->input('dirid')];
        $format->code = 1;
    }
    function createDir($request,$format){
        try{
            $makedir = $this->dir->create(
                [
                    'name'=>$request->input('name'),
                    'url'=>time(),
                    'summary'=>$request->input('summary'),
                    'created_at'=>time()
                ]
            );
            $userdir = $this->userdir->create(
                [
                    'userid'=>\Auth::id(),
                    'dirid'=>$makedir->id
                ]
            );
           $save = ($makedir&&$userdir);
    
           if($save){
               $format->code = 1;
               $format->data = ['message'=>'保存成功','url'=>$makedir->url];
           }else{
                throw new \Exception("保存失败");
           }

        }catch(\Exception $e){
            $format->code = 4;
            $format->data = $e->getMessage();
        }
    }
    function createFile($request,$format){
        try{
           $dirid = $request->input('dirid');
           $dir = $request->input('dir');
           $file = time();
           $html = $file.'.html';
           $filename = $request->input('title');
           $makefile = $this->makefile->makefile($dir,$file,$filename,'# hello word');
           $makehtml = $this->makefile->makefile($dir,$html,$filename,'<h1>Hello word</h1>');
           $dirfile = $this->dirfile->create(
                [
                    'fileid'=>$makefile['id'],
                    'htmlid'=>$makehtml['id'],
                    'dirid'=>$dirid,
                    'created_at'=>time()
                ]
            );
            if($dirfile){
                $format->code = 1;
                $format->data = ['message'=>'保存成功','url'=>$makefile['url']];
            }else{
                throw new \Exception("保存失败");
            }

        }catch(\Exception $e){
            $format->code = 4;
            $format->data = $e->getMessage();
        }
    }
    function showMd($request,$format){
        if(empty($request->input('path'))) $doc = "#朝花夕拾\n繁花在时光中凋零，在记忆中盛开。";
        else $doc =  Storage::get($request->input('path'));
        $format->code = 1;
        $format->data = ['doc'=>$doc,'path'=>$request->input('path')];
    }
    function showHtml($request,$format){
        if(empty($request->input('path'))) $doc = "<h1>朝花夕拾</h1><hr>繁花在时光中凋零，在记忆中盛开。";
        else $doc =  Storage::get($request->input('path'));
        $format->code = 1;
        $format->data = ['doc'=>$doc,'path'=>$request->input('path')];
    }

    function updateFile($request,$format){
        try{
            $savedoc = Storage::put($request->input('path'), $request->input('doc'));
            $savefile = Storage::put($request->input('path').'.html', $this->htmlHead.$request->input('test-editor-html-code').$this->htmlBody);
            $save = ($savedoc&&$savefile);
            if($save){
	            $format->code = 1;
                $format->data = ['message'=>'保存成功'];
            }
        }catch(\Exception $e){
            $format->code = 4;
            $format->data = $e->getMessage();            
        }
    }    
}
