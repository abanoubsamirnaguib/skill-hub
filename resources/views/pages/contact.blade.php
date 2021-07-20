@extends('master.master');
@section('title','Contact US');

@section('header')
{{-- @parent --}}

@php
     $email= App\Models\Setting::select("email")->first()->email;
     $phone= App\Models\Setting::select("phone")->first()->phone;
@endphp

<div class="hero-area section">

    <!-- Backgound Image -->
    {{-- <div class="bg-image bg-parallax overlay" style="background-image:url(./img/page-background.jpg)"></div> --}}
    <div class="bg-image bg-parallax overlay"
        style="background-image:url({{ asset('assets/img/home-background.jpg') }})">
    </div>

    <!-- /Backgound Image -->

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <ul class="hero-area-tree">
                    <li><a href="{{ url('/SkillsHub/home', []) }}">Home</a></li>
                    <li>Contact</li>
                </ul>
                <h1 class="white-text">Get In Touch</h1>

            </div>
        </div>
    </div>

</div>
@endsection

@section('contents')
<div id="contact" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
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

            <!-- contact form -->
            <div class="col-md-6">
                <div class="contact-form">
                    <h4>Send A Message</h4>
                    <form method="POST" action="{{ url('SkillsHub/fillcontact') }}"> @csrf
                        <input class="input" type="text" name="name" placeholder="Name">
                        <input class="input" type="email" name="email" placeholder="Email">
                        <input class="input" type="text" name="subject" placeholder="Subject">
                        <textarea class="input" name="message" placeholder="Enter your Message"></textarea>
                        <button class="main-button icon-button pull-right">Send Message</button>
                    </form>
                </div>
            </div>
            <!-- /contact form -->

            <!-- contact information -->
            <div class="col-md-5 col-md-offset-1">
                <h4>Contact Information</h4>
                <ul class="contact-details">
                    <li><i class="fa fa-envelope"></i>  {{$email}}</li>
                    <li><i class="fa fa-phone"></i> {{$phone}}</li>
                </ul>

            </div>
            <!-- contact information -->

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