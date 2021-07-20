@extends('Dashboard.layout')
@section("title",'Admin Panel')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Skills</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Skills</li>
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
                            <h3 class="box-title text-muted text-center">Skills</h3>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    add new
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">New Skills</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">


                                                <div class="box box-primary">
                                                    <!-- /.box-header -->
                                                    <!-- form start -->
                                                    <form role="form" id="NewSkills"
                                                        action="{{ url('/SkillsHub/Dashboard/Skills/store') }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="name1"> NAME </label>
                                                                <input type="text" class="form-control" id="name1"
                                                                    name="name" placeholder="Enter Name Of New Skill">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="desc1"> Descrition </label>
                                                                <input type="text" class="form-control" id`="desc1"
                                                                    name="desc"
                                                                    placeholder="Enter Descrition Of New Skill">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="img1"> Image </label>
                                                                <input type="file" class="form-control" id`="img1"
                                                                    name="img" placeholder="Enter Image Of New Skill">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Select</label>
                                                                <select class="form-control" name="cats">
                                                                    @foreach ($Cats as $cat)
                                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                        </div>

                                                    </form>
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" form="NewSkills">Create
                                                    New</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="box-tools">

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
                                        <th> Status</th>
                                        <th> Category</th>
                                        <th> Actions</th>
                                    </tr>
                                    @foreach ($Skills as $Skill )
                                    <tr>
                                        {{-- <td>{{$loop->iteration}}</td> --}}
                                        <td>{{$Skill->id}}</td>
                                        <td>{{$Skill->name}}</td>
                                        <td>{{$Skill->desc}}</td>
                                        <td><img src="{{ asset("$Skill->img") }}" alt="skill image" width="70"
                                                height="50"> </td>
                                        {{-- <td> {{$Skill->active}}</td> --}}
                                        <td>
                                            @if ($Skill->active)
                                            <a href="{{ url('/SkillsHub/Dashboard/Skills/ActiveToggleSkill', [$Skill->id]) }}"
                                                class="badge bg-success Active">
                                                Active
                                            </a>
                                            @else
                                            <a href="{{ url('/SkillsHub/Dashboard/Skills/ActiveToggleSkill', [$Skill->id]) }}"
                                                class="badge bg-danger Active">
                                                Not Active
                                            </a>
                                            @endif
                                        </td>
                                        <td> {{$Skill->cat->name}}</td>
                                        <td>
                                            <button type="button" class="btn bg-orange margin Edit-btn"
                                                data-toggle="modal" data-target="#exampleModalCenter_1"
                                                data-name="{{$Skill->name}}" data-id="{{$Skill->id}}"
                                                data-desc="{{$Skill->desc}}" data-img="
                                                {{ $Skill->img }}" data-cat_id="{{$Skill->cat_id}}">
                                                Edit<i class="px-2 fa fa-edit"></i></button>

                                            <div class="modal fade" id="exampleModalCenter_1" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit
                                                                Skill</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

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

                                                            <div class="box box-primary">
                                                                <!-- /.box-header -->
                                                                <!-- form start -->
                                                                <form role="form" id="UpdateSkills"
                                                                    action="{{ url('/SkillsHub/Dashboard/Skills/update') }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="box-body">
                                                                        <div class="form-group">
                                                                            <input type="text" hidden name="id"
                                                                                id="Edit-id">
                                                                            <label for="exampleInputEmail1"> NAME
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                id="Edit-name" name="NewName"
                                                                                placeholder="Enter New Name Of Skill">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="Edit-desc"> Descrition </label>
                                                                            <input type="text" class="form-control"
                                                                                id="Edit-desc" name="desc"
                                                                                placeholder="Enter Descrition Of New Skill">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="img1"> Image </label>
                                                                            <input type="file" class="form-control"
                                                                                id`="Edit-img" name="img"
                                                                                placeholder="Enter Image Of New Skill">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Select</label>
                                                                            <select class="form-control" name="cats"
                                                                                id="Edit-cats">
                                                                                @foreach ($Cats as $cat)
                                                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                            </div>

                                                            </form>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                form="UpdateSkills">Update
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                        </div>



                        <a href="{{ url("/SkillsHub/Dashboard/Skills/Delete/$Skill->id") }}" type="button"
                            class="btn bg-purple btn-flat margin">Delete
                            <i class="px-2t fa fa-trash"></i></a>
                        </td>
                        </tr>
                        @endforeach ()
                        </tbody>
                        </table>
                    </div>
                    {{ $Skills->links() }}
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            {{-- </div> --}}

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>

@endsection

@section('script')
<script>
    $(".Edit-btn").click(function () { 
    let id =$(this).data("id");
    let name =$(this).data("name"); 
    // let img =$(this).data("img");
    let desc =$(this).data("desc");
    let cat_id =$(this).data("cat_id");
  
  $("#Edit-id").val(id);
  $("#Edit-name").val(name);
  $("#Edit-desc").val(desc);
//   $("#Edit-img").val(img);
  $("#Edit-cats").val(cat_id);
  });


</script>

@endsection