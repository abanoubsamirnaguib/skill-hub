@extends('master.master');
@section('title','Contact US');

@section('header')
{{-- @parent --}}


<!-- Hero-area -->
<div class="hero-area section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay"
        style="background-image:url({{ asset('assets/img/home-background.jpg') }})"></div>
    <!-- /Backgound Image -->

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <ul class="hero-area-tree">
                    <li><a href="{{ url('/SkillsHub/home', []) }}">Home</a></li>
                    <li>{{ $cats->name }}</li>
                </ul>
                <h1 class="white-text">{{ $cats->name }}</h1>

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

                <!-- row -->
                <div class="row">
                    @foreach ($skills as $skill)



                    <!-- single skill -->
                    <div class="col-md-4">
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="{{url('/SkillsHub/skill/show',[$skill->id])}}">
                                    <img src="{{ asset($skill->img) }}" alt="">
                                </a>
                            </div>
                            <h4><a href="{{url('/SkillsHub/skill/show',[$skill->id])}}">{{$skill->name}}</a></h4>
                            <h4><a href="{{url('/SkillsHub/skill/show',[$skill->id])}}">{{$skill->desc}}</a></h4>
                            <div class="blog-meta">
                                <span> {{ $skill->created_at->format('d M,Y')}}</span>
                                <div class="pull-right">
                                    <span class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i>
                                            35</a></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /single skill -->
                    @endforeach


                </div>
                <!-- /row -->

                <!-- row -->
                <div class="row">

                    <!-- pagination -->

                    {{ $skills->links("inc.paginate") }}

                    <!-- pagination -->

                </div>
                <!-- /row -->
            </div>
            <!-- /main blog -->

            <!-- aside blog -->
            <div id="aside" class="col-md-3">

                <!-- search widget -->
                <div class="widget search-widget">
                    <form>
                        <input class="input" type="text" name="search">
                        <button><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /search widget -->

                <!-- category widget -->
                <div class="widget category-widget">
                    <h3>Categories</h3>
                    @php
                    $allcats=App\Models\Cat::select("name", "id")->get();
                    @endphp

                    @foreach ($allcats as $cat)

                    <a class="category" href="{{url('/SkillsHub/category/show',[$cat->id])}}">{{$cat->name}}
                        <span>{{$cat->skills->count()}}</span></a>
                    @endforeach

                </div>
                <!-- /category widget -->
            </div>
            <!-- /aside blog -->

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