<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>rust</title>
    <script src="https://unpkg.com/htmx.org@1.8.5" integrity="sha384-7aHh9lqPYGYZ7sTHvzP1t3BAfLhYSTy9ArHdP3Xsr9/3TlGurYgcPBoFmXX2TX/w" crossorigin="anonymous"></script>
    <style>
        .button {
            background-color: #008CBA;
            border-radius: 3px;
            border: none;
            color: white;
            font-family : Tahoma sans-serif;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
        }
        .primary {
            background-color: #cbc9c9; color: black;
        }
        .info {
            background-color: #008CBA;
        }
        .alert {
            background-color: #f44336;
        }
        .success {
            background-color: #4CAF50;
        }
        .warning {
            background-color: #e8c00e;
        }
        .content-in > div{
            border-bottom-style: dotted;
            border-bottom: 1px dotted green;
        }

        .close.icon {
            color: #000;
            position: absolute;
            margin-top: 0;
            margin-left: 0;
            width: 21px;
            height: 21px;
        }

        .close.icon:before {
            content: '';
            position: absolute;
            top: 10px;
            width: 21px;
            height: 1px;
            background-color: currentColor;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }

        .close.icon:after {
            content: '';
            position: absolute;
            top: 10px;
            width: 21px;
            height: 1px;
            background-color: currentColor;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .pagination{
            margin: 10px 0;
            text-align: center;
        }
        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd; /* Gray */
            border-radius: 3px;
            margin: 0 2px;
            cursor: pointer;
        }

        .pagination a.active {
            background-color: #6da270;
            color: white;
            border: 1px solid #6da270;
        }
        .pagination a:hover:not(.active) {background-color: #ddd;}
        .pagination > div {
            display: inline-block;
        }

        .my-indicator{
            z-index: 1000;
            width: 0;
            height: 5px;
            background:  red;
            position: fixed;
            top: 0;
            left: 0;

        }
        .htmx-request .my-indicator{
            width: 100%;
            transition: width 2s;
        }
        .htmx-request.my-indicator{
            width: 98%;
            transition: width 2s;
        }

    </style>
</head>
<body>

@section('nav')
    @include('front.nav')
@endsection

<div class="nav" style="padding: 10px 30px;">
    @yield('nav')


</div>
<div class="container" style="padding: 10px 30px;">
    <div class="loader my-indicator"></div>
    @yield('content')
</div>
</body>
</html>
