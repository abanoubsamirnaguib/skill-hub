@extends('master.master');

@section('title','login');

@section('header')
{{-- @parent --}}


<div class="hero-area section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('assets/img/home-background.jpg') }})"></div>
    <!-- /Backgound Image -->

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <ul class="hero-area-tree">
                    <li><a href="{{ url('/SkillsHub/home', []) }}">Home</a></li>
                    <li>Sign In</li>
                </ul>
                <h1 class="white-text">Sign In to start exam</h1>

            </div>
        </div>
    </div>

</div>
<!-- /Hero-area -->
@endsection

@section('contents')
	<div id="contact" class="section">

    <!-- container -->
    <div class="container">

        <div class="row">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div> 
        @endif
        </div>
        
        <!-- row -->
        <div class="row">

            <!-- login form -->
            <div class="col-md-6 col-md-offset-3">
                <div class="contact-form">
                    <h4>Sign In</h4>
                    <form method="post" action="{{ url('SkillsHub/SignIn', []) }}"> @csrf
                        <input class="input" type="email" name="email" placeholder="Email">
                        <input class="input" type="password" name="password" placeholder="Password">
                        <button type="submit" class="main-button icon-button pull-right">Sign In</button>
                    </form>
                </div>
            </div>
            <!-- /login form -->

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Contact -->

@endsection;

@section('footer')
@parent;
@endsection;