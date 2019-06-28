<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/css/app.css" />
    <script src="/js/app.js"></script>
    <script src="/jquery.js"></script>
    <!--link rel="stylesheet" type="text/css" href="/css/DrSky.css"/-->
  
    <!-- Bootstrap CSS -->

<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>萌向星空-资料库</title>
    <style>

	header{
		background:#2b437b;
		color:#fff;
	}
	header a{
		color:#fff;
	}
    #mymenu{
        display: none;
    }

    .sidebar_list{
        display:block;
    }
    .card{
        /*width：100%;*/
        width: 15rem;
        margin:.5rem 1rem 0 1rem;
    }
    a{
        text-decoration: none;
        text-decoration:none
    }
    #link_modal{
        position: fixed;
        top: 0rem;
        width: 100%;
        z-index: 5;
        display: none;
    }
 #tips_modal{
        position: fixed;
        top: 0rem;
        width: 100%;
        z-index: 5;
        display: none;
    }
@media only screen and (max-width:780px){
 #tips_modal{
	display:block;
	}
	.navbar-nav-scroll {
		max-width:100%;
		height:2.5rem;
		margin-top:.25rem;
		overflow:hidden;
		font-size:.875rem;
	}
	.nav-link{
		padding:.5rem .5rem;
	}
	.card{
        width:100%;
        margin:.5rem 1rem 0 1rem;
    }
    #mymenu{
        display: block;
    }
    .sidebar_list{
        display:none;
    }

	.web-title{
		display:none;
	}
}
        </style>
 </head>
  <body>
       <header class="navbar  flex-column flex-md-row bd-navbar">
 			
            <ul class="navbar-nav flex-rows web-title">
                <li class="nav-item" href="#"><h4>萌向星空</h4></li>
            </ul>
            <div class="navbar-nav-scroll">
			<ul class="nav  flex-rows">
                <li class="nav-item">
                    <a class="nav-link  disabled" href="#">技能树</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="/public/ShowView/information">资料库</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">文档库</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">代码库</a>
                </li>
			    <li class="nav-item">
                    <a class="nav-link disabled" href="#">笔记本</a>
                </li>
	
			    <li class="nav-item">
	            	<a class="dropdown-toggle" id="mymenu"></a>
				</li>
            </ul>
             </div>
        </header>
                <span class="caret"></span>
        <div class="container-fluid">
            <div class="row flex-xl-nowap">
                <div id="sidebar" class="col-12 col-md-3 col-xl-2">
                    <form>
                        <input class="form-control" type="text" placeholder="搜索框">
                    </form>
                    <div class="sidebar_list">
                        <ul class="list-group">
  <li class="list-group-item list-group-item-action list-group-item-primary"><a href=".">首页</a></li>
  <li class="list-group-item list-group-item-action list-group-item-primary"><a href="/public/AdminView">管理页</a></li>
  <li class="list-group-item list-group-item-action list-group-item-primary">按a-z字母顺序排序</li>
  <li class="list-group-item list-group-item-action list-group-item-primary">按更新日期排序</li>
  <li class="list-group-item list-group-item-action list-group-item-primary">按浏览量排序</li>
  <li class="list-group-item list-group-item-action list-group-item-primary">按收藏量排序</li>
</ul>
                </div>
                </div>
<div class="alert alert-success" id="tips_modal" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
 <h4 class="alert-heading">Tips!</h4> 
  <p>注意右上角，菜单旁边的小三角是本页的下拉菜单项哦~</p>
   
</div>

<div class="alert alert-success" id="link_modal" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
 <h4 class="alert-heading">Thanks!</h4> 
  <p>感谢你使用萌向星空,你需要的链接已经准备就绪,也欢迎你转发和分享萌向星空的地址，让萌向星空能够更好的帮助你</p>
  <hr>
  <p class="mb-0" id="user_link"></p>
  <p class="DrSky_link">Cmfac.com</p>
   
</div>
 
                <main  class="col-12 col-md-9 col-xl-10 py-md-3 pl-md-5 bd-content">
                    <div class="row" id="content"></div>
                    
                </main>
            </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  </body>
<script>
    $("#mymenu").click(function(){
        //$('.sidebar_list').css('display','block') ;
        $('.sidebar_list').fadeToggle(1000);
    });
             $.post('information/content',
                    {
                        'method':'getcontent',
                        '_token':"{{ csrf_token() }}"
                    },
                    function(data,status){
                        console.log(data);
                        data = JSON.parse(data);
                        for (const key in data) {
                                val = data[key];
                                id = val['id'];
                                name = val['name'];
                                title = val['title'];
                                link = val['value'];
                                htm =  "<div id ='"+id+"'class='card mb-3'>"+
                                        "<div class='card-header '>"+name+"</div>"+
                                        "<div class='card-body'>"+
                                        "<p class='card-text'>"+title+"</p>"+
                                        "</div>"+
                                        "<div class='card-text  text-right'>"+
                                            "<div class='btn-group-sm' role='group' aria-label='Button group with nested dropdown'>"+
                                                "<button type='button' class='btn btn-light' value='"+link+"' onclick='copy_link(this)'>Copy</button>"+
                                                "<a href='http://"+link+"' class='btn btn-info'>Go to</a>"+
                                                "<button type='button' class='btn btn-success'>Collected</button>"+
                                                
                                            "</div>"+
                                       "</div>"+
                                        "</div>"+
                                    "</div>";
                              $('#content').prepend(htm);
                           
                        }
                    });
    
function copy_link(v){
    $('#user_link').text(v.value);
    $('#link_modal').fadeIn();
    console.log(v.value);
}
$(".close").click(function(){$(".alert").hide();});

</script>
 
</html>
