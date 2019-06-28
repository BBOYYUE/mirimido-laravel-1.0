<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/css/app.css" >
    <script src="/js/app.js"></script>
    <script src="/jquery.js"></script>
    <!--link rel="stylesheet" type="text/css" href="/css/DrSky.css"/-->
  
    <!-- Bootstrap CSS -->

<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>萌向星空-编辑页</title>
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
.alert{
        position: fixed;
        top:.5rem;
        display: none;
        width:100%;
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
    
	.web-title{
		display:none;
	}
}
        </style>
 </head>
  <body>
        <header class="navbar  flex-column flex-md-row bd-navbar">
            <div class="alert alert-success" role="alert">
                保存成功！
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            </div>
            <div class="alert alert-warning" role="alert">
                有必填项没有填!
            </div>
            <div class="alert alert-danger" role="alert">
                保存失败!
            </div>
            <div class="alert alert-primary" role="alert">
                正在保存！
            </div>

            <ul class="navbar-nav flex-row web-title">
                <li class="nav-item" href="#"><h4>萌向星空-编辑页</h4></li>
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
                    <a class="nav-link  disabled" href="#">文档库</a>
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
                    <div class="sidebar_list">
                        <ul class="list-group">
  <li class="save list-group-item list-group-item-action list-group-item-primary">保存</li>
  <li class="list-group-item list-group-item-action list-group-item-primary">保存草稿</li>
  <li class="back list-group-item list-group-item-action list-group-item-primary">返回</li>
</ul>
                </div>
                </div>
                <main class="col-12 col-md-9 col-xl-10 py-md-3 pl-md-5 bd-content">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                        </div>
                            <input id="name" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Link</span>
                        </div>
                            <input id="link" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="form-group">
                        <textarea id="title" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="在这里输入资源简介"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-6">
                        <button  class='save btn btn-success' style="width:100%">保存</button>
                        </div>
                        <div class="col-6">
                        <button  class='back btn btn-warning' style="width:100%">返回</button>
                        </div>
                    </div>
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

    $('.save').click(
        function(){
            name = $('#name').val();
            link = $('#link').val();
            title = $('#title').val();
            if(name&&link&&title){
                error = 1;
                $('.alert-primary').fadeIn(1000);
                $('.alert-primary').fadeOut(2000)
                
            }else{
                error = 0;
                $('.alert-warning').fadeIn(1000);
                $('.alert-warning').fadeOut(2000);
            }
            if(error == 1){
                 $.post('save',
                    {
                        'name':name,
                        'link':link,
                        'title':title,
                        '_token':"{{ csrf_token() }}"
                    },
                    function(data,status){
                        if(status == 'success'){
                            $('.alert-success').fadeIn(3000);
                            $('input').val(null);
                            $('textarea').val(null);
                        }else{
                            $('.alert-danger').fadeIn(3000);
                        }
                    });
    

            }
        })
        $('.back').click(function(){
            window.location.href='.';
        })


</script>
 
</html>
