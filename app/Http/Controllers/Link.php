<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class Link extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type='show')
    {
        //
        switch($type){
            case 'show':
                $links = $this->show('all',new \App\Link);
                // var_dump($links);
                foreach($links as $key=>$link){
                    $links[$key]->user=DB::table('users')->where('id','=',$link->user)->select('name')->first()->name;
                }
               return view('LinkShow')->with('links',$links);
            case 'update':
                return view('LinkUpdate');
                break;
            case 'delete':
                return view('LinkDelete');
                break;
            case 'create':
                return view('LinkCreate');
                break;
        }
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
    public function create(Request $request)
    {
        //
        $title = $request->input('title');
        $link = $request->input('link');
        $summary = $request->input('summary');
        $user = Auth::id();
        $rights = $this->rights(755);
        $links = DB::table('links')->insertGetId(['title'=>$title,'link'=>$link,'created_at'=>Carbon::now(),'summary'=>$summary,'user'=>$user,'rights'=>$rights,'main'=>'null']);
        //echo $title.$link.$summary.$user.$rights;
        return $links;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
