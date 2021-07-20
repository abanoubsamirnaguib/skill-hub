@extends('master.master');
@section('title','profile');
@section('header');

<div class="hero-area section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('assets/img/home-background.jpg') }} )"></div>
    <!-- /Backgound Image -->

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h2 style="color: #FFF;">Profile</h2>
                <ul class="hero-area-tree">
                    <li><a href="href="{{ url('/SkillsHub/home') }}">Home</a></li>
                    <li><a href="">profile</a></li>
                </ul>
                <h1 class="white-text"></h1>
            </div>
        </div>
    </div>

</div>
@endsection

@section('contents')
@auth
    

<table class="mt-5 container table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>exam</th>
            <th>score</th>
            <th>time</th>
        </tr>
        </thead>
        <tbody>
            @foreach (Auth::user()->exams as $exam)
            <tr>
                <td scope="row">{{$exam->name}} of {{$exam->skill->name}}</td>
                <td>{{$exam->pivot->score}}</td>
                <td>{{$exam->pivot->time_mins}}</td>
            </tr>
            @endforeach
        </tbody>
</table>
@endauth
@endsection;

@section('footer')
@parent;
@endsection;
