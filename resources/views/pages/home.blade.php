@extends('master.master')

@section('title','Home')

@section('link')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet">

@endsection

@section('header')





<div id="home" class="hero-area">
    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('assets/img/home-background.jpg') }})"></div>
    <!-- /Backgound Image -->
<div class="home-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="white-text">SkillsHub Free Online Skill Assessment</h1>
                <p class="lead white-text">Libris vivendo eloquentiam ex ius, nec id splendide abhorreant, eu pro alii error homero.</p>
                <a class="main-button icon-button" href="#">Get Started!</a>
            </div>
        </div>
    </div>
</div>  
</div>
@endsection

@section('contents')





	<!-- Courses -->
    <div id="courses" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">
                <div class="section-header text-center">
                    <h2>Popular Exams</h2>
                    <p class="lead">Libris vivendo eloquentiam ex ius, nec id splendide abhorreant.</p>
                </div>
            </div>
            <!-- /row -->

            <!-- courses -->
            <div id="courses-wrapper">

                <!-- row -->
                <div class="row">
                    @foreach ($skills as $skill)
                    {{-- {{$skill->img}} --}}
                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset("$skill->img") }} " alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">{{$skill->desc}}</a>
                            <div class="course-details">
                                <span class="course-category"> Skill :: {{$skill->name}}</span> <br>
                                <span class="course-category"> Category :: {{$skill->cat->name}}</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->
                    @endforeach

{{-- 
                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset('assets/img/exam2.jpg') }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">Introduction to CSS </a>
                            <div class="course-details">
                                <span class="course-category">Programming</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset('assets/img/exam3.jpg') }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">The Ultimate Drawing Course | From Beginner To Advanced</a>
                            <div class="course-details">
                                <span class="course-category">Drawing</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset('assets/img/exam4.jpg') }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">The Complete Web Development Course</a>
                            <div class="course-details">
                                <span class="course-category">Web Development</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course --> --}}

                </div>
                <!-- /row -->

                <!-- row -->
                {{-- <div class="row">

                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset('assets/img/exam5.jpg') }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">PHP Tips, Tricks, and Techniques</a>
                            <div class="course-details">
                                <span class="course-category">Web Development</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset('assets/img/exam6.jpg') }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">All You Need To Know About Programming</a>
                            <div class="course-details">
                                <span class="course-category">Programming</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset('assets/img/exam7.jpg') }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">How to Get Started in Photography</a>
                            <div class="course-details">
                                <span class="course-category">Photography</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->


                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset('assets/img/exam8.jpg') }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">Typography From A to Z</a>
                            <div class="course-details">
                                <span class="course-category">Typography</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                </div> --}}
                <!-- /row -->

            </div>
            <!-- /courses -->
            <div class="row">
                <div class="center-btn">
                    <a class="main-button icon-button" href="#">More Courses</a>
                </div>
            </div>

        </div>
        <!-- container -->

    </div>
    <!-- /Courses -->

    

    <!-- Contact CTA -->
    <div id="contact-cta" class="section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('assets/img/cta.jpg') }})"></div>
        <!-- Backgound Image -->

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <div class="col-md-8 col-md-offset-2 text-center">
                    <h2 class="white-text">Contact Us</h2>
                    <p class="lead white-text">Libris vivendo eloquentiam ex ius, nec id splendide abhorreant.</p>
                    <a class="main-button icon-button" href="{{ url('/SkillsHub/contact', []) }}">Contact Us Now</a>
                </div>

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /Contact CTA -->

@endsection

@section('footer')
@parent


@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> 

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>
   
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('defb9dddda42e4393e3c', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('Notification');

   
    channel.bind('Sent', function() {
    //   alert(JSON.stringify(data));
     console.log("h");
     
    });
  </script>

@endsection