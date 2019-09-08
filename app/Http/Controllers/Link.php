<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Format\format;
use Carbon\Carbon;
class Link extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type='show',format $format,\App\Link $link)
    {
        try{
            $data = $link->leftJoin('users','users.id','links.user')->select('links.*','users.name')->paginate(24);
            if($data){
                $format->code = 1;
                $format->data = $data;
            }
        }catch(\Exception $e){
            $format->code=4;
            $format->data=$e->getMessage();
        }
        return view('Link/show')->with('data',$format->getHtml());
    }
    public function rights($rights){
        $r = 1;
        $w = 10;
        $u = 100;
        $f = floor($rights/100);
        $s = floor(($rights-($f*100))/10);
        $t = $rights-($f*100)-($s*10);
        $arr =[$f,$s,$t];
        $rights = '';
        foreach($arr as $val) {
            $c = 0;
            if($val&$r) $c=$c+$r;
            if($val&$w) $c=$c+$w; 
            if($val&$u) $c=$c+$u; 
            $rights = $rights.$c;
        }
        return $rights;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,format $format)
    {
        //
        try{
            $title = $request->input('title');
            $link = $request->input('link');
            $summary = $request->input('summary');
            $user = Auth::id();
            $rights = $this->rights(755);
            $links = DB::table('links')->insertGetId(['title'=>$title,'link'=>$link,'created_at'=>Carbon::now(),'summary'=>$summary,'user'=>$user,'rights'=>$rights,'main'=>'null']);
            if($links){
                $format->code = 1;
                $format->data = ['message'=>'保存成功'];
            }
        }catch(\Exception $e){
            $format->code = 4;
            $format->data = ['message'=>$e->getMessage()];
        }
        return $format->getHtml();
    }
    public function show($id,\App\link $link)
    {
        //
        if($id=='all') return $link->paginate(24);
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
