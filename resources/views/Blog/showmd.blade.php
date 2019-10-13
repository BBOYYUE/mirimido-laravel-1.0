@extends('layouts/iframe')
@section('head')
    <link rel="stylesheet" href="{{ asset('/editormd/css/editormd.css') }}" />
    <!--link rel="stylesheet" href="{{ asset('/css/katex.min.css') }}" /-->
@endsection
@section('content')
       <div class="container-fluid" style="padding: 0">
<form id='md'>
    @csrf
           <div class="card">
                <div id="test-editor" class="card-body">
                <textarea class="editormd-markdown-textarea" name="doc"  id="doc" style="display:none;">{{$data->data['doc']}}</textarea>
                </div>
                <div class="card-footer">
                    <button  class='pull-right btn btn-success' type="button" data-dismiss="modal" onclick="saveMd()">保存</button>
                    此编辑器使用了开源的Editor.md  - cy
                </div>
        </div>
    </form>
       </div>
@endsection
@section('script')
    <script src="/js/jquery.js"></script>
    <script src=" {{ asset('editormd/editormd.js') }} "></script>
    <!--script src=" {{ asset('editormd/katex.js') }} "></script-->
@parent
<script type="text/javascript">
    $(function() {
        var editor = editormd("test-editor", {
            height : $(window).height(),
            border : "none",
            path   : "/editormd/lib/",
            saveHTMLToTextarea: true,
            emoji: true,
            tex: true,                   // 开启科学公式TeX语言支持，默认关闭
        });
      
   });
</script>
<script>
/*
        setInterval(() => {
            var form = document.querySelector("#md");
            var formData = new FormData(form);
            formData.append('path',"{{$data->data['path']}}");
            getPost(formData,'/userfile/updatefile/gethtml','quiet',false);
        }, 10000);
*/    
 function saveMd(){
        var form = document.querySelector("#md");
        var formData = new FormData(form);
        formData.append('path',"{{$data->data['path']}}");
        getPost(formData,'/userfile/updatefile/gethtml','default',false);
    }
</script>
@endsection