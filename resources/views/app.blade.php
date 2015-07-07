<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My App</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">--}}

    <!-- Latest compiled and minified JavaScript -->
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}
</head>
<body>
    <div class="container">
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

        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script>
            $('div.alert').not('.alert-important').delay(3000).slideUp(300);
        </script>
        @yield('content')
    </div>
</body>
</html>