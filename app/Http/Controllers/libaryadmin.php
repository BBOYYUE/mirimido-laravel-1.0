<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class libaryadmin extends Controller
{
    //
    public function quickadd(){
        return view('libaryadmin_quickadd');
    }
	public function quickedit(){
		$id = $_GET['id'];
		$arr = array([$id,'title'],[$id,'value']);
		foreach($arr as $value){
			$this->select_value($value[0],$value[1]);
		}
		$data = $this->select;
		
		return view('libaryadmin_quickedit',$data);
	}
	public function select_value($column_libary_id,$column_libary_type){
		$where = array(['column_libary_id','=',$column_libary_id],['column_libary_type','=',$column_libary_type]);
		$req  = DB::table('table_libary')->where($where)->get();
		foreach($req as $val){
			$this->select[$column_libary_type]=$val->column_libary_value;
			$this->select['name']=$val->column_libary_name;
			$this->select['id']=$val->column_libary_id;
		}
	}
    public function save(){
        $name = $_POST['name'];
        $title = $_POST['title'];
        $link = $_POST['link'];
        $this->hashID();
        $id = $this->hashID;
        var_dump($id);

        $this->insert_value = ['column_libary_name'=>$name,'column_libary_id'=>$id,'column_libary_type'=>'value','column_libary_value'=>$link,'column_libary_user'=>'root']; 
        $this->insert_type = ['column_libary_name'=>$name,'column_libary_id'=>$id,'column_libary_type'=>'type','column_libary_value'=>'link','column_libary_user'=>'root']; 
        $this->insert_show = ['column_libary_name'=>$name,'column_libary_id'=>$id,'column_libary_type'=>'show','column_libary_value'=>'y','column_libary_user'=>'root']; 
        $this->insert_title = ['column_libary_name'=>$name,'column_libary_id'=>$id,'column_libary_type'=>'title','column_libary_value'=>$title,'column_libary_user'=>'root']; 
        $this->sqlArr = [$this->insert_value,$this->insert_type,$this->insert_show,$this->insert_title];
        DB::transaction(function(){
            DB::table('table_libary')
            ->insert($this->sqlArr);
        });
    }
	public function update(){
		$name = $_POST['name'];
        $title = $_POST['title'];
        $link = $_POST['link'];

        $this->update_value = ['column_libary_name'=>$name,'column_libary_value'=>$link,'column_libary_user'=>'root']; 
        $this->update_type = ['column_libary_name'=>$name,'column_libary_value'=>'link','column_libary_user'=>'root']; 
        $this->update_show = ['column_libary_name'=>$name,'column_libary_value'=>'y','column_libary_user'=>'root']; 
        $this->update_title = ['column_libary_name'=>$name,'column_libary_value'=>$title,'column_libary_user'=>'root']; 
        $this->sqlArr = [$this->update_value,$this->update_type,$this->update_show,$this->update_title];
        DB::transaction(function(){
			$id = $_POST['id'];
            	DB::table('table_libary')
					->where('column_libary_id',$id)
					->where('column_libary_type','value')
           			 ->update($this->sqlArr[0]);
            	DB::table('table_libary')
					->where('column_libary_id',$id)
					->where('column_libary_type','type')
           			 ->update($this->sqlArr[1]);
            	DB::table('table_libary')
					->where('column_libary_id',$id)
					->where('column_libary_type','show')
           			 ->update($this->sqlArr[2]);
            	DB::table('table_libary')
					->where('column_libary_id',$id)
					->where('column_libary_type','title')
           			 ->update($this->sqlArr[3]);
      
        });

	}
    public function hashID($n=1,$m=1){
        // ID 是6位数的
        // ID mod 620  = [2,3,5,7,11....];
        // H(K) = K MOD M
        $y = (floor(100000/620)+$n)*620;
        $x = $y+1;
        $sql  = "SELECT column_libary_id FROM table_libary WHERE column_libary_id ='".$x."'";
        $a = DB::select($sql);
        if(empty($a)) return $this->hashID=$x;
        else{
            $a=$a[0];
            //var_dump($a);
            $a = (array)$a;
            $a = $a['column_libary_id'];
            if($a>999999) return $this->hashID($n+1,$m+1);
            else  return $this->hashID($n+1);
        } 
    }

}
