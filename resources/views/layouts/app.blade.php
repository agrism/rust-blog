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
            cursor: pointer;
            display: inline-block;
            font-family : Tahoma sans-serif;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
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
            border-bottom: 1px dotted green;
            border-bottom-style: dotted;
        }

        .close.icon {
            color: #000;
            height: 21px;
            margin-left: 0;
            margin-top: 0;
            width: 21px;
            position: absolute;
        }

        .close.icon:before {
            background-color: currentColor;
            content: '';
            height: 1px;
            position: absolute;
            top: 10px;
            width: 21px;
            transform: rotate(-45deg);
            -webkit-transform: rotate(-45deg);
        }

        .close.icon:after {
            background-color: currentColor;
            content: '';
            height: 1px;
            position: absolute;
            top: 10px;
            transform: rotate(45deg);
            width: 21px;
            -webkit-transform: rotate(45deg);
        }

        .pagination{
            margin: 10px 0;
            text-align: center;
        }
        .pagination a {
            border: 1px solid #ddd; /* Gray */
            border-radius: 3px;
            color: black;
            cursor: pointer;
            float: left;
            margin: 0 2px;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
        }

        .pagination a.active {
            background-color: #6da270;
            border: 1px solid #6da270;
            color: white;
        }
        .pagination a:hover:not(.active) {background-color: #ddd;}
        .pagination > div {
            display: inline-block;
        }

        .my-indicator{
            background:  red;
            height: 5px;
            left: 0;
            position: fixed;
            top: 0;
            width: 0;
            z-index: 1000;

        }
        .htmx-request .my-indicator{
            transition: width 2s;
            width: 100%;
        }
        .htmx-request.my-indicator{
            transition: width 2s;
            width: 98%;
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
