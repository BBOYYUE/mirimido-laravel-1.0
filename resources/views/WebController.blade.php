<!DOCTYPE html>
<html lang="zh-CN">
    <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src ="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src ="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <!--link rel="stylesheet" type="text/css" href="/css/DrSky.css"/-->
    <style>
        .heaer{
            position:fixed;
            top:0rem;
            width:100%;
        }
        .box{
            width:80%;
            margin:0 auto;
            
        }
        .box td{
            padding:2rem 4rem 2rem 4rem;
        }
        .page_title{
            margin:2rem 0 4rem 2rem;
            dispaly:bolck;
            color:#232028;
        }
        .right_menu{
            float:right;
            width:25%;
            height:100%;
            background:#fff;
            border-top:solid 1rem #dfdfdf;
        }
        .right_menu_header{
            background:#dfdfdf;
        }
        .right_menu_content{
            display:none;
        }
        .table{
            margin-bottom:0;
        }
        .right_menu{
            position:fixed;
            top:-1rem;
            display:none;
        }
        tr{
            border:solid 1px #dfdfdf;
        }
@media only screen and (max-width:780px){
    .right_menu{
        width:100%;
    }
    .box{
        width:100%;
        display:block;
        margin:.5rem; 
    }
    .box td{
            padding:2rem 2rem 2rem 2rem;
        }
        .page_title{
            margin:.5rem;
            dispaly:bolck;
            color:#232028;
        }
     
}
        </style>

</head>
<body>
<div class="right_menu">
    <table class="table right_menu_header">
    <tr><td><h4 style="text-align:center"  id="reMenu"><a>修改菜单项</a></h4></td>
    
    <td><h4 style="text-align:center" id="addMenu"><a>新增子菜单</a></h4></td></tr>
    </table>
    <form class="form-horizontal" >
<table class="table table-hover right_menu_content" id="addMenu_content">
        <div class="form-grop">
            <tr><td colspan="2"><label class="col-sm-12 control-label">子菜单中文名</label></td></tr>
        <tr><td colspan="2">
            <div class="col-sm-12">
                <input class="form-control" type="text" id="addMenu_name">
            </div>
        </td></tr>
        </div>
         <div class="form-grop">
            <tr><td colspan="2"><label class="col-sm-12 control-label" >子菜单英文名(路径)</label></td></tr>
            <tr><td colspan="2">
                <div class="col-sm-12">
                    <input class="form-control" type="text" id="addMenu_router">
                </div>
            </td></tr>
        </div>
        <div class="form-grop">
            <tr><td colspan="1" >
                <div class="col-sm-12">
                    <button type="button" class="btn btn-success" id="addMenu_submit" style="width:100%;">保存</button>
                </div>
            </td>
            <td colspan="1">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-warning" id="addMenu_close" style="width:100%;">返回</button>
                </div>
            </td>
        </tr>
        </div>
    </table>
    <input type="hidden" id="addMenu_path" class = "input_router" name="router">
    <input type="hidden" id="addMenu_extends" class = "input_extends" name="extends">
    <input type="hidden" id="addMenu_method" value="reMenu" name="method">
    </form>

    <form class="form-horizontal" >
    <table style="position:relative;" class="table table-hover right_menu_content"id="reMenu_content">
        <div class="form-grop">
            <!--tr><td colspan="2"><label class="col-sm-12 control-label" >新名字</label></td></tr-->
            <tr><td colspan="2">
                <div class="col-sm-12">
                    <textarea name="pageTitle" id="pageTitle" class="form-control" placeholder="这里是简介" rows=5></textarea>
                </div>
            </td></tr>
        </div>
         
        <div class="form-grop">
        <tr><td colspan="1">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-success" id="reMenu_submit" style="width:100%;">保存</button>
                </div>
            </td>
             <td colspan="1">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-warning" id="reMenu_close" style="width:100%;">返回</button>
                </div>
            </td>
        </tr>

        </tr>
        </div>
    </table>
    <input type="hidden" id="reMenu_path" class = "input_router" name="router">
    <input type="hidden" id ="reMenu_method" name="method" value="reMenu">
        </form>
    <div style="padding:2rem; border:solid 1px #dfdfdf;height:100%">
    <dl>
        <h3>菜单项概览</h3>
        <dt>他的name,id,router:</dt>
        <dd id="ddname"></dd>
        <dt>他的父菜单为:</dt>
        <dd id="ddparent"></dd>
        <dt>他的子菜单有:</dt>
        <dd id="ddson"></dd>
        <dt>他的简介</dt>
        <dd id="ddtitle"></dd>
        
        <button type="button" class="btn btn-warning" id="Menu_close" style="width:100%;">返回</button>
    </dl>
</div>
</div>

    <div class="header">
    <h1 class="page_title" >超级无敌的萌向星空架构控制页</h1>
    <hr>
    </div>


    <div class="box table-responsive">
 
    <table id="menu_path">
    </table>
</div>
<script>

    var table = '{!! $table !!}';
    /*
        数组长这样
        $arr = array(
            "router" => "path",
            "name" => "网站根目录",
            "extends"=>array(
                array(
                    "router" => "path_ShowView",
                    "name" => "展示页",
                    "extends" => array(
                        "router" =>'path-ShowView_LinkLibary',
                        'name' =>'资料库'
                    ),
                ),
                array(
                    'router' => "path_AdminView",
                    "name" => "管理页"
                )
            )
        );
    */
    console.log(table);
    table = JSON.parse(table);
    var path  = 'menu_path';
    v = showMenu(table,path);
    function showAlone(table,path,trid){
            path = '#'+path;
            var htm = '<tr id="'+trid+'"><td><button type="button" class="btn btn-primary btn-lg" id="'+table.router+'" onclick="myfunction(this)" name="'+table.parent+'">'+table.name+'</button></td></tr>';
//            console.log(path);
            $(path).append(htm);
    }
    function showMenu(table,path){
        if(table.extends){
            var trid = 'm_'+table.router;
            showAlone(table,path,trid);
            showMenu(table.extends,trid);
        }else if(table.router){
            var trid = 'm_'+table.router;
            showAlone(table,path,trid);
        }else if(!table.router){
            //console.log(table.router);
            for(m in table){
//                console.log(m);
                showMenu(table[m],path);
            }
            //return showMenu(table,path);
        }else{
            return ;
        }
    }
</script>


    <script>
if($('.right_menu').css('height')<$(window).height()){
    $('.right_menu').css('height',$(window).height());
}else{
    $('.rightmenu').css('height',$(document).height());
}
// 菜单显示的方法        
        $('#reMenu').click(function(){
            $('#reMenu').css('color','#fff');
            $('#addMenu').css('color','#232028');
            $('#reMenu_content').slideUp(1000);
            $('#addMenu_content').fadeOut(1000);
            $('#reMenu_content').fadeIn(1000);
        });
        $('#addMenu').click(function(){
            $('#addMenu').css('color','#fff');
            $('#reMenu').css('color','#232028');
            $('#reMenu_content').slideDown(1000);
            $('#reMenu_content').fadeOut(1000);
             $('#addMenu_content').fadeIn(1000);
        });
       $('#reMenu_close').click(function(){
                $('.right_menu').fadeOut(1000);
                $('#addMenu').css('color','#232028');
                $('#reMenu_content').fadeOut(1000);
        }) 
        $('#addMenu_close').click(function(){
                $('.right_menu').fadeOut(1000);
                $('#addMenu').css('color','#232028');
                $('#addMenu_content').fadeOut(1000);    
        })
        $('#Menu_close').click(function(){
                $('.right_menu').fadeOut(1000);
                $('#addMenu').css('color','#232028');
                $('#addMenu_content').fadeOut(1000);    
                $('#reMenu_content').fadeOut(1000);    
        })
        function myfunction(value){
            var router = value.id;
            $.post('WebController/getRouter',
                    {
                        'router':router,
                        '_token':"{{ csrf_token() }}"
                    },
                    function(data,status){
                      console.log(data);
                        data = JSON.parse(data);
                        $('#ddname').html("<span>"+data.name+" | "+"</span><span>"+data.id+" | "+"</span><span>"+data.router+"</span>");
                        $('#ddparent').html("<span>"+data.parent+"</span>");
                        $('#ddson').html("<span>"+data.son+"</span>");
                        $('#ddtitle').html("<span>"+data.title+"</span>");
                    });
    
            $('.input_router').attr('value',value.id);
            $('.right_menu').fadeIn(1000);
    $('.right_menu').css('height',$(document).height());
       }


      $(document).ready(function(){
            $('#addMenu_submit').click(function(){
                // 表单name值
                var name = $('#addMenu_name').val();
                // 表单路径值
                var router = $('#addMenu_router').val();
                // 隐藏表单方法值
                var method = $('#addMenu_method').val();
                // 要执行操作的基础 id
                var path = $('#addMenu_path').val();  
                // add需要加 router
                // add有parent
                parent = path;
                router = parent+'_'+router;
                path="#"+path;
                // 如果已经有
                alert("新的子菜单的路径为"+router+"名字为"+name);
                if($(path).parent().next().html()){
                    var ht = '<tr><table><tr><td><button type="button" class="btn btn-primary btn-lg" id="'+router+'" onclick="myfunction(this)">'+name+'</button></td></tr></table></tr>'
                    $(path).parent().next().prepend(ht);
                }else{
                    var ht = '<td><tr><table><tr><td><button type="button" class="btn btn-primary btn-lg" id="'+router+'" onclick="myfunction(this)">'+name+'</button></td></tr></table></tr></td>'
                    $(path).parent().parent().append(ht);
                }
                $.post('WebController/addMenu',
                    {
                        'method':method,
                        'parent':parent,
                        'router':router,
                        'name':name,
                        '_token':"{{ csrf_token() }}"
                    },
                    function(data,status){
    //                    console.log(data);
                    });
            })
        });
        $(document).ready(function(){
            $('#reMenu_submit').click(function(){
                var method = $('#reMenu_method').val();
                var path = $('#reMenu_path').val();  
                var pageTitle = $('#pageTitle').val();
                //   alert(name+'/'+router+'/'+method+'/'+path);
                router = path;
  //              path="#"+path;
             //   $(path).html('hello php');
//                var ht = '<tr><td><button type="button" class="btn btn-primary btn-lg" id="'+router+'" onclick="myfunction(this)" name="'+parent+'">'+name+'</button></td></tr>';
    //            $(path).parent().before(ht);
     //           $(path).parent().remove();
   //             $('.right_menu').fadeOut(1000);
    //            $('#addMenu').css('color','#232028');
    //            $('#addMenu_content').fadeOut(1000);
               $.post('WebController/reMenu',
                    {
                        'router':router,
                        'method':method,
                        'pageTitle':pageTitle,
                        '_token':"{{ csrf_token() }}"
                    },
                    function(data,status){
                        console.log(data);
                    });
            })
        })
                
    </script>
</body>
</html>
