<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My App</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css"/>
    <style rel="stylesheet">
        .starter-template {
            padding: 40px 15px;
            /*text-align: center;*/
        }

    </style>
    <!-- Optional theme -->
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">--}}

    <!-- Latest compiled and minified JavaScript -->
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}
</head>
<body>
    @include('partials.nav')

    <div class="container">
        <div class="starter-template">
        {{--@if(Session::has('flash_message'))--}}
            {{--<div class="alert alert-success {{ Session::has('flash_message_important')? '.alert-important': '' }}">--}}
                {{--@if(Session::has('flash_message_important'))--}}
                    {{--<button type="button" class="close" data-dismiss="alert" area-hidding="true">&times;</button>--}}
                {{--@endif--}}
                {{--{{ Session::get('flash_message') }}--}}
                {{-- same functanall as above can obtain oftain from the following --}}
                {{--{{ session('flash_message') }}--}}
            {{--</div>--}}
        {{--@endif--}}

        @include('partials.flash')

        {{--same as the above @include('partials.flash')--}}
        {{--include a partial from the laracasts flash facade--}}
        {{--@include('flash::message')--}}

        {{--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>--}}
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}
        <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
        <script>
            $('div.alert').not('.alert-important').delay(3000).slideUp(300);
        </script>
        @yield('content')
        </div>
    </div>
</body>
</html>