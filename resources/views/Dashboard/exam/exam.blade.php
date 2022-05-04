@extends('Dashboard.layout')
@section("title",'Admin Panel')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Exams</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Exams</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @include('Dashboard.inc.msg')

                {{-- <div class="row"> --}}
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title text-muted text-center">Exams</h3>
                            <div class=" float-right">
                                <!-- Button trigger modal -->
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

                                <a href='{{ url("/SkillsHub/Dashboard/Exams/create", []) }}' class="btn btn-primary">
                                    add new
                                </a>
                            </div>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover w-100">
                                <tbody>
                                    <tr>
                                        <th> ID</th>
                                        <th> Name</th>
                                        <th> Description </th>
                                        <th> Image </th>
                                        <th> skill</th>
                                        <th> question no.</th>
                                        <th> active</th>
                                        <th> Actions</th>
                                    </tr>
                                    @foreach ($Exams as $Exam )
                                    <tr>
                                        {{-- <td>{{$loop->iteration}}</td> --}}
                                        <td>{{$Exam->id}}</td>
                                        <td>{{$Exam->name}}</td>
                                        <td>{{$Exam->desc}}</td>
                                        <td><img src="{{ asset("$Exam->img") }}" alt="skill image" width="70"
                                                height="50"> </td>
                                        <td> {{$Exam->skill->name}}</td>                                                             
                                        <td> {{$Exam->questions_no}}</td>
                                        <td>
                                            @if ($Exam->active)
                                            <a href="{{ url('/SkillsHub/Dashboard/Exams/ActiveToggleExam', [$Exam->id]) }}"
                                                class="badge bg-success Active">
                                                Active                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                                            </a>
                                            @else
                                            <a href="{{ url('/SkillsHub/Dashboard/Exams/ActiveToggleExam', [$Exam->id]) }}"
                                                class="badge bg-danger Active">
                                                Not Active
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- show --}}
                                            <a href='{{ url("/SkillsHub/Dashboard/Exams/show/$Exam->id", []) }}'
                                                class="btn bg-gradient-gray margin Edit-btn">
                                                <i class="px-2 fa fa-eye"></i></a>
                                            {{-- show Question--}}
                                            <a
                                                href='{{ url("/SkillsHub/Dashboard/Exams/show/$Exam->id/Question", []) }}'
                                                class="btn bg-gradient-indigo margin Edit-btn">
                                                <i class="px-2 fa fa-question"></i></a>
                                            {{-- edit --}}
                                            <a href='{{ url("/SkillsHub/Dashboard/Exams/Edit/$Exam->id", []) }}'
                                                class="btn bg-orange margin Edit-btn">
                                                <i class="px-2 fa fa-edit"></i></a>


                        </div>



                        <a href="{{ url("/SkillsHub/Dashboard/Exams/Delete/$Exam->id") }}" type="button"
                            class="btn bg-purple btn-flat margin">
                            <i class="px-2t fa fa-trash"></i></a>
                        </td>
                        </tr>
                        @endforeach ()
                        </tbody>
                        </table>
                    </div>
                    {{ $Exams->links() }}
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>


        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>

@endsection

@section('script')

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>
   
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('defb9dddda42e4393e3c', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('SentNotification');
    channel.bind('Exam-Add', function(data) {
    //   alert(JSON.stringify(data));
      toastr.success('Have fun storming the castle!')
    });
  </script> --}}

@endsection