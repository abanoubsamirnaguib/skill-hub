@extends('master.master');

@section('title')
exam in {{ $exam->skill->name }} {{ $exam->name }}
@endsection

@section("link")
<link rel="stylesheet" href="{{ asset('assets/css/TimeCircles.css') }}">
@endsection

@section('header')
{{-- @parent --}}
<!-- Hero-area -->
<div class="hero-area section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay"
        style="background-image:url({{ asset( 'assets/img/home-background.jpg') }} )"></div>
    <!-- /Backgound Image -->

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <ul class="hero-area-tree">
                    <li><a href="{{ url('/SkillsHub/home') }}">Home</a></li>
                    <li><a
                            href="{{ url('/SkillsHub/category/show',[$exam->skill->cat->id]) }}">{{ $exam->skill->cat->name }}</a>
                    </li>
                    <li><a href="{{ url('/SkillsHub/skill/show',[ $exam->skill->id]) }}">{{ $exam->skill->name }}</a>
                    </li>
                    <li>{{ $exam->name }}</li>
                </ul>
                <h1 class="white-text">{{$exam->name}}</h1>
                <ul class="blog-post-meta">
                    <li>{{$exam->created_at->format('d M,Y')}}</li>
                    <li class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> 35</a></li>
                </ul>
            </div>
        </div>
    </div>

</div>
<!-- /Hero-area -->
@endsection

@section('contents')

<div id="blog" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- main blog -->
            <div id="main" class="col-md-9">
                <form action="{{ url('SkillsHub/exam/submit',[$exam->id]) }}" method="POST" id="exam-submit-form">
                @csrf
                </form>
                <!-- blog post -->
                <div class="blog-post mb-5">
                    <p>
                        @foreach ($exam->questions as $key=> $question)

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{$key+1}}-{{$question->title}}</h3>
                            </div>
                            <div class="panel-body">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="answers[{{$question->id}}]" id="optionsRadios1" value="1" form="exam-submit-form">
                                        {{$question->option_1}}
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="answers[{{$question->id}}]" id="optionsRadios2" value="2" form="exam-submit-form">
                                        {{$question->option_2}}
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="answers[{{$question->id}}]" id="optionsRadios3" value="3" form="exam-submit-form">
                                        {{$question->option_3}} 
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="answers[{{$question->id}}]" id="optionsRadios4" value="4" form="exam-submit-form">
                                        {{$question->option_4}}
                                    </label>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        <div>
                            <button type="submit" form="exam-submit-form" class="main-button icon-button pull-left">Submit</button>
                            <button class="main-button icon-button btn-danger pull-left ml-sm">Cancel</button>
                        </div>
                    </p>
                </div>
                <!-- /main blog -->
            </div>
            <!-- row -->

            <!-- aside blog -->
            <div id="aside" class="col-md-3">

                <!-- exam details widget -->
                <ul class="list-group">
                    <li class="list-group-item">Skill: {{$exam->skill->name}}</li>
                    <li class="list-group-item">Questions: {{$exam->questions_no}}</li>
                    <li class="list-group-item">Duration: {{$exam->duration_mins}}</li>
                    <li class="list-group-item">Difficulty:
                        @for($i=1; $i<=$exam->difficulty; $i++)
                            <i class="fa fa-star"></i>
                            @endfor
                            @for($i=1; $i<= 5-($exam->difficulty); $i++)
                                <i class="fa fa-star-o"></i>
                                @endfor
                    </li>
                </ul>
                <!-- /exam details widget -->
                <!-- /aside blog -->
                
                <div class="example stopwatch" data-timer="{{$exam->duration_mins *60}}"></div>
            </div>
            <!-- container -->
        </div>
    </div>
    @endsection;

    @section('footer')
    @parent;
    @endsection;

    @section("script")
    <script type="text/javascript" src="{{ asset('assets/js/TimeCircles.js') }}"> </script>
    <script>
        $(".example").TimeCircles({
            time:{
                Days:{show:false}
        }},
    {count_past_zero: false}
    );
    $(".example").TimeCircles({count_past_zero: false}).addListener(countdownComplete);
        
    function countdownComplete(unit, value, total){
        if(total<=0){
            $(this).fadeOut('slow').replaceWith("<h2>Time's Up!</h2>");
        }
    }
    </script>
    @endsection