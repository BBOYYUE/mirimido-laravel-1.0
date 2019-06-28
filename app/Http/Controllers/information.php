<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class information extends Controller
{
    //
    public function content(){
        $sql = 'SELECT column_libary_id FROM table_libary WHERE column_libary_type = "type" AND column_libary_value="link"';
        $arr =array();
        $r = DB::select($sql);
        foreach($r as $v){
            $v = (array)$v;
            $v = $v['column_libary_id'];
            $arr['id']=$v;
            $sqlv = 'SELECT column_libary_name,column_libary_value,column_libary_user  FROM table_libary WHERE column_libary_type="value" AND column_libary_id="'.$v.'"';
            $n = DB::select($sqlv);
            $n = (array)$n;
            $n = $n[0];
            $n= (array)$n;
            $name = $n['column_libary_name'];
            $value = $n['column_libary_value'];
			$user = $n['column_libary_user'];
            $arr['name'] = $name;
            $arr['value']= $value;
			$arr['user'] = $user;
            $sqlt = 'SELECT column_libary_value FROM table_libary WHERE column_libary_type="title" AND column_libary_id="'.$v.'"';
            $t =DB::select($sqlt);
            $t = (array)$t;
            $t = $t[0];
            $t = (array)$t;
            $title = $t['column_libary_value']; 
            $arr['title'] = $title;
            $this->req[]=$arr;
            $arr=array();
        }
        return json_encode($this->req);
        /*
        return json_encode(array([
            'name'=>'php',
            'title'=>'php是世界上最好的语言',
            'link'=>'13'         
        ],[
            'name'=>'php',
            'title'=>'php是世界上最好的语言' ,
            'link'=>'11'        
        ]
    )
		*/
//$arr = array([$id,'title'],[$id,'value']);
//		foreach($arr as $value){
//			$this->select_value($value[0],$value[1]);
    }
}
