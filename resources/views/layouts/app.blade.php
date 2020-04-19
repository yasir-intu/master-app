<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Authentication forms">
    <meta name="author" content="Arasari Studio">

    <title>Master design</title>
    <link rel="icon" href="{{ asset('contents/login') }}/img/fab_icon.png">
    <link href="{{ asset('contents/login') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('contents/login') }}/css/common.css" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('contents/login') }}/css/theme-04.css" rel="stylesheet">

</head>

<body>
    <div class="forny-container">

        <div class="forny-inner">
            <div class="forny-two-pane">
                <div class="{{Request::is('/login')? 'height':''}}">
                    <div class="forny-form">
                        <div class="mb-6 forny-logo text-center">
                            <img src="{{ asset('contents/login') }}/img/logo2.png">
                        </div>
                        @yield('login')
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="{{ asset('contents/login') }}/js/jquery.min.js"></script>
    <script src="{{ asset('contents/login') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('contents/login') }}/js/main.js"></script>
    <script src="{{ asset('contents/login') }}/js/demo.js"></script>

</body>

</html>
