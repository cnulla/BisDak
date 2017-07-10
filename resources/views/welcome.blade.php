<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BisDak</title>

        <!-- External CSS -->
       <link href="./css/bootstrap.min.css" rel="stylesheet">
       <link href="./css/welcome.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600|Bebas+Neue" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Rancho&effect=anaglyph" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="top-right links"> 

            @if (Auth::guest())
                <a href="{{ url('/developer') }}">Developers</a>
            @else
                <a href="{{ url('/developer') }}">Home</a>
                <a href="{{ url('/home') }}">Dashboard</a>
                <ul class="nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>

            @endif
            </div>
        <div class="flex-center position-ref full-height">
            

            <div class="content">
                <div class="title header">
                   BisDak
                </div>
                <div class="subtitle subheader">
                    A Rule-based Morphological Analyzer for Cebuano Language
                </div>
                <hr class="md">
                <div class="container">
                    <div class="tag-box">
                        <form action = '' method ='POST'>
                            <div class="form-group">
                                <input type="text" class="form-control" id="input_word" name="wordInput" placeholder="Input a word...
                                ">

                            </div>
                            <div class="form-group"> 
                                <input type="submit" class="btn btn-hd" value="ANALYZE">
                            </div>  
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">                    
                        </form>
                    </div>
                </div>
                <hr class="md">
                @yield('content')
            </div>
        </div>

        <script src="./js/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
    </body>
</html>
