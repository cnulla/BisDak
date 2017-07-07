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
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>

        <div class="flex-center position-ref full-height">
            <div class="top-right links"> 
            @if (Route::has('login'))
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ url('/developer') }}">Developers</a>
                @endif
            @endif
            </div>

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
                                <input type="submit" class="btn btn-hd">ANALYZE</input>
                            </div>  
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">                    
                        </form>
                    </div>
                </div>
                <hr class="md">
                <div class="container info ">
                    <h1 class="subtitle"><strong>Output</strong></h1>
                    <hr class="nd">
                    
                    <div class="baseform">
                        
                        <h4><strong>BASE FORM</strong></h4>
                        <h5><center><strong>Root Word</center></strong></h5>
                        <hr class="nd">

                        <h4><strong>AFFIXES</strong></h4>
                        <h6>Prefix | </h6>
                        <h6>Infix |</h6>
                        <h6>Suffix |</h6>

                    </div>
                    <div class="sentence">
                        <h4><strong>AMBIGUITY</strong></h4>
                        <hr class="nd">
                        <h5><strong>Part of Speech</strong></h5>
                        <h6>Example Sentence</h6>
                    </div>
                    <div class="sentence">
                        <h4><strong>GRAMMATICAL PROPERTIES</strong></h4>
                        <hr class="nd">
                        <h6>Grammatical Property of Verb or Noun</h6>
                    </div>
                
                </div>
            </div>
        </div>

        <script src="./js/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
    </body>
</html>
