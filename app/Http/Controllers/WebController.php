<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
    }

    /*s
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
    public function home(){
//       $this->first();
//      $this->endtest();
        // 查id 
       //$sql_req_1 = DB::select("SELECT B.column_libary_value FROM table_libary AS B WHERE B.colum_libary_type = 'extends'");
        //$sql_req_2 = DB::select("SELECT C.column_libary_value FROM table_libary AS C WHERE C.colum_libary_type = 'menu'");
//        $sql_req_3 = DB::select("SELECT column_libary_value FROM table_libary AS A , table_libary AS B  WHERE A.column_libary_type='value' AND  B.column_libary_type='menu' AND A.column_libary_id = B.column_libary_id");
        //$this->hashID= $this->hashID();
        //var_dump($this->hashID);
        $this->findExtendsMenu();
     // $a =   DB::table('table_libary')->select()->get();
     // echo "<br>";
     //   var_dump($a);
    // var_dump($this->routerArray);
    // echo "<br>";
        $this ->tree = $this->ListMenu($this->routerArray);
    //  var_dump($this->tree);
        //var_dump($sql_req->all());
        $arr = json_encode($this->tree);
        return view('WebController')->with('table',$arr);
    }
    // 处理多维数组，将其转换成前端需要的样子
    // 需要传入两个参数 参数一为多维数组 参数二为第一个数组的键
    public function ListMenu($arr,$key='path'){


       // var_dump($arr);
        // 先查这个路径的信息
        $sql = "SELECT column_libary_name,column_libary_id FROM table_libary WHERE `column_libary_type` = 'value' AND `column_libary_value`='".$key."'";
        $p = DB::select($sql);
      //  var_dump($p);
        if(!empty($p)){
            $p =$p[0];
            $p = (array)$p;
            $name = $p['column_libary_name'];
            $value = $key;
        }
        // 查他的子元素
        $sql = "SELECT column_libary_id FROM table_libary WHERE `column_libary_type`='extends' AND `column_libary_value`='".$key."'";
        $p = DB::select($sql);
        if(!empty($p)){
            if(is_array($arr[$key])){
                foreach($arr[$key] as $val){
                    $extends[] = $this->ListMenu($arr,$val);
                }
            }else{
                $extends = $this->ListMenu($arr,$arr[$key]);
            }
            return array(
                'name'=>$name,
                'router'=>$value,
                'extends'=>$extends
            );

        }else{
            return array(
                'name'=>$name,
                'router'=>$value,
            );

        }
    }
       
    




    // 获取一个菜单项的子项
    public function findExtendsMenu($column_libary_value=''){
     //   var_dump($column_libary_value);
     // 先查他有没有子元素
        $sql_req = DB::select("SELECT column_libary_id FROM table_libary WHERE column_libary_type='extends' AND column_libary_value='".$column_libary_value."'");
       // $sql_req = $sql_req->all();

        if(empty($column_libary_value)) $column_libary_value =0;
       // var_dump($sql_req);
      //  return ;
        if(empty($sql_req)){
            return ; 
        }else{
            $arr = array();
            foreach($sql_req as $value){
                //$value = $value->toArray();
                $value = (array)$value;
                $value = $value['column_libary_id'];
                //var_dump($value);
                //return;
                //return ;
                $str = "SELECT column_libary_value FROM table_libary WHERE column_libary_type='value' AND  column_libary_id='".$value."'";
                $req = DB::select($str);
                $req = $req[0];
                $req = (array)$req;
              //  var_dump($req);
                $str = $req['column_libary_value']; 
               
                $arr[] = $str;
            }
            $this->routerArray[$column_libary_value] = $arr; 

            foreach($arr as $value){
               $this->findExtendsMenu($value);
            }
        }
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

    // 获取一个菜单详细信息
    public function findMenu($column_libary_value){
        // 查看是否为菜单
   //     $sql_req_1 = DB::select("SELECT column_libary_id FROM table_libary WHERE column_libary_id ='".$column_libary_value."' AND column_libary_type='type' AND column_libary_value='menu'");
   //     $sql = DB::select("SELECT * FROM table_libary WHERE column_libary_type = 'type' AND column_libary_value = 'menu'");
   //     var_dump($sql);
   //     return ;    
  //      $column_libary_id = $sql_req_1[0]->all();
  //      $column_libary_id = $column_libary_id['column_libary_id'];
        // 查路径
        $sql_req_2 = DB::select("SELECT * FROM table_libary WHERE column_libary_type = 'value' AND column_libary_value='".$column_libary_value."'");
        $arr = $sql_req_2[0];
        $arr = (array)$arr;
        $column_libary_value = $arr['column_libary_value'];
        $column_libary_name = $arr['column_libary_name'];
        $column_libary_id = $arr['column_libary_id'];
        $sql_parent = DB::select("SELECT column_libary_value FROM table_libary WHERE column_libary_type='extends' AND column_libary_id='".$column_libary_id."'");
       // var_dump($sql_parent);
        if(!empty($sql_parent))
        {
            $sql_parent= $sql_parent[0];
            $parent = (array)$sql_parent;
            $parent = $parent['column_libary_value']; 
        }else{
            $parent ="没有爸爸,是个孤儿";
        } 
        $sql_son = DB::select("SELECT column_libary_id FROM table_libary WHERE column_libary_type='extends' AND column_libary_value='".$column_libary_value."'");
        $son = [];
        if(is_array($sql_son)){
            foreach($sql_son as $v){
                $v = (array)$v;
                if(!empty($v)) $value = $v['column_libary_id'];
                $sqlvalue = DB::select("SELECT column_libary_value FROM table_libary WHERE column_libary_type = 'value' AND column_libary_id ='".$value."'");
                $sqlvalue = $sqlvalue[0];
                $sqlvalue = (array)$sqlvalue;
                $son[]=$sqlvalue['column_libary_value'];
            }
        }
        $str ="";
        $i = 1;
        if(is_array($son)) {
            foreach($son as $v){
                $str.=$i.':'.$v." ";
                $i++;
            }
        }
        $sql_title = DB::select("SELECT column_libary_value FROM table_libary WHERE column_libary_type='title' AND column_libary_id='".$column_libary_id."' ORDER BY id DESC");
        if(!empty($sql_title)) $sql_title=$sql_title[0];
        $sql_title = (array)$sql_title;
      //  var_dump($sql_title);
        if(!empty($sql_title)) $title = $sql_title['column_libary_value'];
        else $title = '他没有简介';
        return array(
            'name'=>$column_libary_name,
            'id'=>$column_libary_id,
            'router'=>$column_libary_value,
            'parent'=>$parent,
            'son' =>$str,
            'title'=>$title
        );
    }
    public function first(){
        $this->insert_value = ['column_libary_name'=>'网站根目录','column_libary_id'=>'100000','column_libary_type'=>'value','column_libary_value'=>'path','column_libary_user'=>'root']; 
        $this->insert_type = ['column_libary_name'=>'网站根目录','column_libary_id'=>'100000','column_libary_type'=>'type','column_libary_value'=>'menu','column_libary_user'=>'root']; 
        $this->insert_show = ['column_libary_name'=>'网站根目录','column_libary_id'=>'100000','column_libary_type'=>'show','column_libary_value'=>'y','column_libary_user'=>'root']; 
        $this->insert_extends = ['column_libary_name'=>'网站根目录','column_libary_id'=>'100000','column_libary_type'=>'extends','column_libary_value'=>'','column_libary_user'=>'root']; 
        $this->sqlArr = [$this->insert_value,$this->insert_type,$this->insert_show,$this->insert_extends];
        DB::transaction(function(){
            $a = DB::table('table_libary')->select()->where('column_libary_id','100000')->get();
            $a = $a ->all();
            var_dump($a);
            if(empty($a)){
            DB::table('table_libary')
            ->insert($this->sqlArr);
            }
         });
    }
    public function endtest(){
        DB::table('table_libary')->where('column_libary_id','200000')->delete();
    }
    public function addMenu(){
       $this->core();
        $this-> checkPost('addMenu');
        if($this->checkError == 0) return 0;
        else return $this-> SaveAddMenu(); 
    }
     public function checkPost($method){
        foreach($_POST as $key => $value){
            $str = $method."_".$key;
            $this->$str = $value;
        }
        if($method == 'addMenu'){
            $sql = "SELECT column_libary_type FROM table_libary WHERE `column_libary_value`='".$this->addMenu_router."'";
            $CheckRouter = DB::select($sql);
            if(empty($CheckRouter)) $this->checkError = 1;  
            else $this->checkError = 0;
        }elseif($method == 'getRouter'){
            $this->checkError = 1;
        }elseif($method == 'reMenu'){
            $this->checkError = 1;
        }
    }
 
    public function saveAddMenu(){
        $this ->hashID();
       if($this->addMenu_router&&$this->addMenu_name){
            $this->insert_value = ['column_libary_name'=>$this->addMenu_name,'column_libary_id'=>$this->hashID,'column_libary_type'=>'value','column_libary_value'=>$this->addMenu_router,'column_libary_user'=>'root']; 
        }else{
            return $this->checkError = 2;
        }
        if($this->addMenu_parent){
            $this->insert_extends = ['column_libary_name'=>$this->addMenu_name,'column_libary_id'=>$this->hashID,'column_libary_type'=>'extends','column_libary_value'=>$this->addMenu_parent,'column_libary_user'=>'root']; 
        }
        $this->insert_type = ['column_libary_name'=>$this->addMenu_name,'column_libary_id'=>$this->hashID,'column_libary_type'=>'type','column_libary_value'=>'menu','column_libary_user'=>'root']; 
        $this->insert_show = ['column_libary_name'=>$this->addMenu_name,'column_libary_id'=>$this->hashID,'column_libary_type'=>'show','column_libary_value'=>'y','column_libary_user'=>'root']; 

        foreach($this->libary_type as $value){
            $sql_type = 'insert_'.$value;
            if(isset($this->$sql_type)) $this->sqlArr[]=$this->$sql_type;
        }
        DB::transaction(function(){
            DB::table('table_libary')
            ->insert($this->sqlArr);
        });
       // var_dump($this->sqlArr);

       

    }
    public function core(){
        $this->table_libary = array(
            'column_libary_name',
            'column_libary_id',
            'column_libary_type',
            'column_libary_value',
            'column_libary_user',   
        );

        $this->libary_type = array(
            'value',
            'type',
            'show',
            'extends'
        );
        $this->error = array(
            0=>"这个资料在数据库中已存在",
            1=>'没有发现问题',
            2=>'这份信息资料不完整无法保存',
        );
 
    }
   public function reMenu(){
        $this->checkPost('reMenu');
        $sql = "SELECT `column_libary_id`,`column_libary_name` FROM table_libary WHERE `column_libary_type` ='value' AND  `column_libary_value`='".$this->reMenu_router."'" ;
        $router = DB::select($sql); 
        if(!empty($router)){ 
            $router = $router[0];
            $router = (array)$router;
           // var_dump($router);
            $router_id = $router['column_libary_id'];
            $router_name = $router['column_libary_name'];
            $sql = "INSERT INTO table_libary (`column_libary_name`,`column_libary_user`,`column_libary_id`,`column_libary_type`,`column_libary_value`) VALUES('".$router_name."','root','".$router_id."','title','".$this->reMenu_pageTitle."') ";
            var_dump(DB::select($sql));     
        }

    }

    public function getRouter(){
        $this->core();
        $this-> checkPost('getRouter');
        if($this->checkError == 0) return 0;
        $router = $this->findMenu($this->getRouter_router);
        return json_encode($router);
    }
}
