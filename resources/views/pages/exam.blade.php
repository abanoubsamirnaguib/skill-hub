@extends('master.master');

@section('title')
exam in {{ $exam->skill->name }} {{ $exam->name }}
@endsection

@section('header')
{{-- @parent --}}
<!-- Hero-area -->
<div class="hero-area section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay"
        style="background-image:url({{ asset('assets/img/home-background.jpg') }} )"></div>
    <!-- /Backgound Image -->

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <ul class="hero-area-tree">
                    <li><a href="{{ url('/SkillsHub/home') }}">Home</a></li>
                    <li><a href="{{ url('/SkillsHub/category/show',[$exam->skill->cat->id]) }}">{{ $exam->skill->cat->name }}</a>
                    </li> 
                    <li><a href="{{ url('/SkillsHub/skill/show',[ $exam->skill->id]) }}">{{ $exam->skill->name }}</a></li>
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
    <!-- Blog -->
    <div id="blog" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- main blog -->
                <div id="main" class="col-md-9">

                    <!-- blog post -->
                    <div class="blog-post mb-5">
                        <p>
                           {{$exam->desc}}
                        </p>
                    </div>
                    <!-- /blog post -->
                    @if (session()->has('success') ) 
                     <div class="alert-success"> {{session("success")}}   </div>   
                     
                    @endif

                    @auth
                    @if ( $canViewStartBtn )
                    <div>
                        <form action="{{ url('/SkillsHub/exam/start', [$exam->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="main-button icon-button pull-left">Start Exam</button>
                        </form>
                    </div>
                    @else <br><div class="alert-danger">Not allowed To enter exam again</div>
                    @endif
                    @endauth
                </div>
                <!-- /main blog -->

                <!-- aside blog -->
                <div id="aside" class="col-md-3">

                    <!-- exam details widget -->
                    <ul class="list-group">
                        <li class="list-group-item">Skill: {{$exam->skill->name}}</li>
                        <li class="list-group-item">Questions: {{$exam->questions_no}}</li>
                        <li class="list-group-item">Duration:  {{$exam->duration_mins}}</li>
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



                </div>
                <!-- /aside blog -->

            </div>
            <!-- row -->

        </div>
        <!-- container -->

    </div>


@endsection;

@section('footer')
@parent;
@endsection;