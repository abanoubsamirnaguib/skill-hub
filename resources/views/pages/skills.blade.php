@extends('master.master');
@section('title')
exams in {{ $skills->name }}
@endsection
;

@section('header')
{{-- @parent --}}


        <!-- Hero-area -->
        <div class="hero-area section">

            <!-- Backgound Image -->
            <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('assets/img/home-background.jpg') }} )"></div>
            <!-- /Backgound Image -->

            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                        <ul class="hero-area-tree">
                            <li><a href="href="{{ url('/SkillsHub/home') }}">Home</a></li>
                            <li><a href="{{ url('/SkillsHub/category/show',[$skills->cat->id]) }}">{{ $skills->cat->name }}</a></li>
                            <li>{{ $skills->name }}</li>
                        </ul>
                        <h1 class="white-text">{{ $skills->name }}</h1>

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
                <div id="main" class="col-md-12">

                    <!-- row -->
                    <div class="row">
                        @foreach ($exams as $exam)
                        <!-- single exam -->
                        <div class="col-md-3">
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="{{ url('SkillsHub/exam/show', [$exam->id]) }}">
                                        <img src="{{ asset($exam->img) }}" alt="">
                                    </a>
                                </div>
                                <h4><a href="{{ url('SkillsHub/exam/show', [$exam->id]) }}">{{$exam->desc}}</a></h4>
                                <h4><a href="{{ url('sSkillsHub/exam/show', [$exam->id]) }}">{{$exam->name}}</a></h4>
                                
                                <div class="blog-meta">
                                    <span>{{ $exam->created_at->format('d M,Y')}}</span>
                                    <div class="pull-right">
                                        <span class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> {{$exam->questions_no}}</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /single exam -->

                        @endforeach

                    </div>
                    <!-- /row -->

                    <!-- row -->
                    <div class="row">

                        <!-- pagination -->
                        {{ $exams->links("inc.paginate") }}
                        <!-- pagination -->

                    </div>
                    <!-- /row -->
                </div>
                <!-- /main blog -->

            </div>
            <!-- row -->

        </div>
        <!-- container -->

    </div>
    <!-- /Blog -->

@endsection;

@section('footer')
@parent;
@endsection;