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
            border-bottom: 1px solid green;
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
    @yield('content')
</div>
</body>
</html>
