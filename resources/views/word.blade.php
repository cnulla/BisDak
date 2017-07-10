@extends('welcome')

@section('content')

<div class="container info ">
    <h2 class="b">OUTPUT | wordhere</h2>
    <hr class="nd">
    
    <div class="baseform">
        <h2 class="b">BASE FORM</h2>
        <h3><center>Root Word</center></h3>
        <hr class="nd">

        <h2 class="b">AFFIXES</h2>
        <h4>Prefix | </h4>
        <h4>Infix |</h4>
        <h4>Suffix |</h4>

    </div>
    <div class="sentence">
        <h2 class="b">AMBIGUITY</h2>
        <hr class="nd">
        <h3 class="b">Part of Speech</h3>
        <h5>Example Sentence</h5>
    </div>
    <div class="sentence">
        <h2 class="b">GRAMMATICAL PROPERTIES</h2>
        <hr class="nd">
        <h5>Grammatical Property of Verb or Noun</h5>
    </div>

</div>

@endsection
