<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="NrEEsLXyZWI5qGi6wgjVTHAn5ObKHeirljVZgDUM">
    <link rel="stylesheet" type="text/css" href="/css/app.css" />
    <script src="/js/app.js"></script>
    <script src="/jquery.js"></script>
    <!--link rel="stylesheet" type="text/css" href="/css/DrSky.css"/-->
  
    <!-- Bootstrap CSS -->

<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>萌向星空</title>
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
	.web-title-1{
		background:#fff;
	}
	.web-title-2{
		text-align:center;
	}
@media  only screen and (min-width:780px){

	.w100{
		width:100%;
	}
}
@media  only screen and (max-width:780px){
	.navbar-nav-scroll {
		max-width:100%;
		height:2.5rem;
		margin-top:.25rem;
		overflow:hidden;
		font-size:.875rem;
	}
	.web-title{
		display:none;
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
                    <a class="nav-link disabled" href="#">技能树</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="/public/ShowView/information">资料库</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled " href="#">文档库</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">代码库</a>
                </li>
			    <li class="nav-item">
                    <a class="nav-link disabled" href="#">笔记本</a>
                </li>

            </ul>
             </div>
                </header>
        <div class="container-fluid">
            	<div class="jumbotron jumbotron-fluid web-title-1 ">
						<div class="container">
							<h3 class="display-4">欢迎</h3>
							
							<p class="lead">萌向星空是一个WEB知识的集合,它主要由分散的资源超链接,经过整理排序的官方文档,一些简洁有力的代码片段,和开发者写的笔记组成。</p>
						</div>
					</div>
                <!--div class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
						</div>
					</div>
				</div-->
            	<div class="jumbotron">
						<div class="container web-title-2">
							<h3 class="display-4">一切为了更方便学习</h3>
							
							<p class="lead">萌向星空一直认为 学习是一个不断积累的过程,如何有效的整理已经学过的知识是有效学习的关键。萌向星空计划使用一个生动形象方便阅读的树图来实现这件事。</p>
								<hr class="half-rule">
							<p class='lead'>此网站尚在开发过程中,如果有同学有比较有趣的想法欢迎+q 1062903887 ,和网站开发者一起讨论</p>
						</div>
				</div>
				<div class="row" id="content"data-target="#list-example" >
							<div  class="card w100">
							<h4  class = "card-header" id="list-item-1">技能树</h4>
							<div class="card-body">
							<p>技能树是将来网站的核心,所有的想法和工作都是为了她在做准备。</p>
							<p>在我的想象中,所有的知识都可以抽象成一个一个的集合,每个集合又包含她的子集。这样每次学习新知识都是建立在已有的基础上,不会偏离目标。学习的过程就是知识框架从粗到细,从模糊到清晰的过程。</p>
							<p>技能树还没有实现,因为我还未想好如何把她展现出来。</p>
							</div>
							</div>
							<div class="card w100">
							<h4 class="card-header" id="list-item-2">资料库</h4>
							<div class="card-body">
							<p>资料库是最具体最实用的部分,因为她是实用的所以简单,容易实现。而且已经实现了</p>
							<p>我对资料库的概念是很久以前就有的,就是保存自己以前遇到过,通过搜索网上的资源解决过的问题。目前的实现形式就是一个一个的卡片,记录他们的地址,和简介。将来的搜索功能要依托技能树。全文搜索是不可取的,通过技能树缩小范围,然后进行搜索,这样就会体现出精准度,和效率.</p>
							</div>
							</div>
							<div class="card w100">
							<h4 class="card-header"  id="list-item-3">文档库</h4>
							<div class="card-body">
							<p>文档库是建立在资料库的基础之上的,将一些官方发布的文档资料独立出来,通过一个目录式的菜单整理出来,类似书籍方便查阅</p>
							</div>
							</div>
						
							<div class="card w100">
							<h4 class="card-header" id="list-item-4">代码库</h4>
							<div class="card-body">		
							<p>代码库本来是要取消的,因为有git了,后来想到有的东西实在太简单,但是却又特别常用,比如零散的代码块,某些特定的方法,现用现查的一些东西,可能就需要特别快速的查找复制然后粘贴。所以新增了代码库</p>
							</div>
							</div>
							<div class="card w100">
							<h4 class="card-header" id="list-item-4">笔记本</h4>
							<div class="card-body">		
							<p>笔记本是和资料库并列的存在,笔记本是自己写的一些心得文章,是自己的学习感悟,一般来讲，写笔记是为了巩固学习成果</p>
							</div>
							</div>
							
							<div class="card">
							<img class ="card-img-top" src="/zanzhu.jpg" alt="开发者还是个孩子,需要你的赞助">
							<div class="card-body">		
							<p>"开发者还是个孩子,需要你的赞助"</p>
							</div>
				</div>

		</div>
                   
 
</body>

<script type="text/javascript">

    $("#mymenu").click(function(){
        //$('.sidebar_list').css('display','block') ;
        $('.sidebar_list').fadeToggle(1000);
    });
 
</script>
</html>





