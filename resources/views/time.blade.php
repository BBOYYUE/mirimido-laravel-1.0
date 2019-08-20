<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="/js/app.js"></script>
        
        <link href="/css/app.css" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>这里是时间戳工具</h1>
            <hr>
            <div class = ' row'>
                <div class="col-12">
                     <label for="time">时间戳:</label>
                    <input type="text" class="form-control col-12" id='time'/>
                     <label for="time">手动日期:</label>
                    <input type="text" class="form-control col-12" id="date2"/>
                     <label for="time">日期选择器:</label>
                    <input type="date" class="form-control col-12" id='date'/>
                </div>
            </div>
        </div>
    </body>
    <script>
        $('#time').change(function(){
            data = {
                'time' : $('#time').val(),
                '_token' : "{{ csrf_token() }}"
            }
            $.post('/test/time',data,function(data,status){
                console.log(data.time);
                $('#date2').val(data.time);
            })
        })
        $('#date2').change(function(){
            data = {
                'date' : $('#date2').val(),
                '_token' : "{{ csrf_token() }}"
            }
            $.post('/test/time',data,function(data,status){
                console.log(data.time);
                $('#time').val(data.time);
            })
        })

        $('#date').change(function(){
            data = {
                'date' : $('#date').val(),
                '_token' : "{{ csrf_token() }}"
            }
            a = $.post('/test/time',data,function(data,status){
                console.log(data.time);
                $('#time').val(data.time);
                data = {
                    'time' : $('#time').val(),
                    '_token' : "{{ csrf_token() }}"
                }

                $.post('/test/time',data,function(data,status){
                    console.log(data.time);
                    $('#date2').val(data.time);
                }) 
            })
        })
    </script>
</html>
