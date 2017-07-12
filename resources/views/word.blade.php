@extends('welcome')

@section('content')

<div class="container info ">
    <h2 class="b">
        OUTPUT | {{$word}}
    </h2>
    <hr class="nd">
    
    <div class="baseform">
        <h3 class="b">BASE FORM</h3>
        <h4><center>{{$rootWord}}</center></h4>
        <hr class="nd">

        <h3 class="b">AFFIXES</h3>
        <h4>Prefix |
            @if (empty($prefix))
                NONE
            @else
                @foreach ($prefix as $key)
                    {{$key}}, 
                @endforeach
            @endif
        </h4>
        <h4>Infix |
            @if (empty($infix))
                NONE
            @else
                @foreach ($infix as $key)
                    {{$key}},
                @endforeach
            @endif

           
        </h4>
        <h4>Suffix |
           @if (empty($suffix))
                NONE
            @else
                @foreach ($suffix as $key)
                    {{$key}},
                @endforeach
            @endif
        </h4>
    </div>
    <div class="sentence">
        <h3 class="b">AMBIGUITY</h3>
        <hr class="nd">
        <h4 class="b">Part of Speech</h4>
        <h5>Example Sentence</h5>
    </div>
    <div class="sentence">
        <h3 class="b">GRAMMATICAL PROPERTIES</h3>
        <hr class="nd">
        <h5>Grammatical Property of Verb or Noun</h5>
    </div>

</div>

@endsection
