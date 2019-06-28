<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <script src="/js/app.js"></script>
    <script src="/jquery.js"></script>
  
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>萌向星空-管理页</title>
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
    th{
        text-align: center;
    }
    td{
        text-align: center;
    }
@media only screen and (max-width:780px){
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
    #mymenu{
        display: block;
    }
    .sidebar_list{
        display:none;
    }
	.md_hidden{
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
            
            <ul class="navbar-nav flex-row web-title ">
                <li class="nav-item" href="#"><h4>萌向星空</h4></li>
            </ul>
            <div class="navbar-nav-scroll">
			<ul class="nav  flex-rows">
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">技能树</a>
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
  <li class="list-group-item list-group-item-action list-group-item-primary"><a href="/public/ShowView/information">展示页</a></li>
  <li class="list-group-item list-group-item-action list-group-item-primary">按a-z字母顺序排序</li>
  <li class="list-group-item list-group-item-action list-group-item-primary">按更新日期排序</li>
  <li class="list-group-item list-group-item-action list-group-item-primary"><a href="/public/AdminView/libaryadmin/quickadd">快速新增</a></li>
</ul>
                </div>
                </div>
                <main class="col-12 col-md-9 col-xl-10 py-md-3 pl-md-5 bd-content">
                   <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">资料名</th>
      <th scope="col" class="md_hidden">地址</th>
      <th scope="col" class="md_hidden">上传者</th>
      <th scope="col">操作</th>
    </tr>
  </thead>
  <tbody id="content">
     </tbody>
</table> 
                </main>
            </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  </body>
<script type="text/javascript">
    $("#mymenu").click(function(){
        //$('.sidebar_list').css('display','block') ;
        $('.sidebar_list').fadeToggle(1000);
    })
 $.post('/public/ShowView/information/content',
                    {
                        'method':'getcontent',
                        '_token':"{{ csrf_token() }}"
                    },
                    function(data,status){
                          console.log(data);
                          data = JSON.parse(data);
                        for (const key in data) {
                                val = data[key];
                                console.log(val);
                                var id = val["id"];
                                var name = val["name"];
								var link = val['value'];
								var user = val['user'];
                                htm = "<tr><td scope='row'>"+id+"</td>"+
                                           "<td>"+name+"</td>"+
										   "<td class='md_hidden'>"+link+"</td>"+
										   "<td class='md_hidden'>"+user+"</td>"+
                                           "<td><div class='btn-group' role='group'>"+
												"<a href='/public/AdminView/libaryadmin/quickedit?id="+id+"' type='button' class='button_edit btn btn-primary btn-sm'>快速编辑</button>"+
                                                "</div>"+
                                            "</td>"+
                                      "</tr>";
                                $('#content').prepend(htm);
                            
                        }
                    });
    

</script>
<script>
</script>
 
</html>
