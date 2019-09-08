@extends('layouts.app')
@section('header-left')
    @component('component/navbar/header-left')
    @endcomponent
@endsection
@section('header-right')
    @component('component/navbar/header-right')
        @auth
            <li class="nav-item">
                <a href="/link/show" class="nav-link">show</a>
            </li>
        @endauth
    @endcomponent
@endsection

@section('content')
       <div class="container-fluid">
            <div class="row flex-xl-nowap">
                <main class="col-12 col-md-12 col-xl-12  bd-content">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                        </div>
                            <input id="Linktitle" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Link</span>
                        </div>
                            <input id="Linklink" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="form-group">
                        <textarea id="Linksummary" class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="在这里输入资源简介"></textarea>
                    </div>
                    <div class="mb-3">
                        <button  class='save btn btn-light' onclick="myfunction()" style="width:100%">保存</button>
                    </div>
                </main>
            </div>
        </div>
    <script src="/js/jquery.js"></script>
    <script>
    function myfunction(){
            title = $('#Linktitle').val();
            link = $('#Linklink').val();
            summary = $('#Linksummary').val();
            if(summary&&link&&title){
                error = 1;
            }else{
                error = 0;
            }
            if(error == 1){
                $('.load').text('正在提交')
                $('.load').fadeIn(1000);
                 $.post('/link/create',
                    {
                        'title':title,
                        'link':link,
                        'summary':summary,
                        '_token':"{{ csrf_token() }}"
                    },
                    function(data,status){
                        if(status == 'success'){
                            console.log(data);
                            $('input').val(null);
                            $('textarea').val(null);
                            $('.load').hide();
                            $('.success').text('保存成功')
                            $('.success').fadeIn(1000);
                        }else{
                            alert(error);
                            $('.load').hide();
                            $('.load').text('保存失败')
                            $('.load').fadeIn(1000);
                        }
                    });
            }else{
                $('.load').text('必填项为空')
                $('.load').fadeIn(1000);
            }
            setTimeout(function(){
                $('.load').fadeOut(1000);
                $('.success').fadeOut(1000);

            },1500)
    }
    </script>
@endsection
<!--
<script>
 $('.save').click(
        function(){
       })
</script>
-->
