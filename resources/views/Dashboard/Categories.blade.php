@extends('Dashboard.layout')
@section("title",'Admin Panel')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Categories</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
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
              <h3 class="box-title text-muted text-center">Categories</h3>
              <div class=" float-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                  add new
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <div class="box box-primary">
                          <!-- /.box-header -->
                          <!-- form start -->
                          <form role="form" id="NewCategories"
                            action="{{ url('/SkillsHub/Dashboard/Categories/store') }}" method="POST">
                            @csrf
                            <div class="box-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1"> NAME </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                                  placeholder="Enter Name Of New Category">
                              </div>

                            </div>
                            <!-- /.box-body -->
                            {{-- <div class="box-footer"> --}}
                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                            {{-- </div> --}}
                          </form>
                        </div>


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" form="NewCategories">Save changes</button>
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
                    <th>Active</th>
                    <th> Status</th>
                    <th> Actions</th>
                  </tr>
                  @foreach ($cats as $cat )
                  <tr>
                    {{-- <td>{{$loop->iteration}}</td> --}}
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->name}}</td>
                    <td> {{$cat->active}}</td>
                    <td>
                      @if ($cat->active)
                      <a href="{{ url('/SkillsHub/Dashboard/Categories/ActiveToggle', [$cat->id]) }}" class="badge bg-success Active">
                        Active
                      </a>
                      @else
                      <a href="{{ url('/SkillsHub/Dashboard/Categories/ActiveToggle', [$cat->id]) }}" class="badge bg-danger Active">
                        Not Active
                      </a>
                      @endif
                    </td>
                    <td>
                      <button type="button" class="btn bg-orange margin Edit-btn" data-toggle="modal"
                        data-target="#exampleModalCenter_1" data-name="{{$cat->name}}" data-id="{{$cat->id}}">
                        Edit<i class="px-2 fa fa-edit"></i></button>

                      <div class="modal fade" id="exampleModalCenter_1" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Edit Category</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <div class="box box-primary">
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" id="UpdateCategories"
                                  action="{{ url('/SkillsHub/Dashboard/Categories/update') }}" method="POST">
                                  @csrf
                                  <div class="box-body">
                                    <div class="form-group">
                                      <input type="text" hidden name="id" id="Edit-id">
                                      <label for="exampleInputEmail1"> NAME </label>
                                      <input type="text" class="form-control" id="Edit-name" name="NewName"
                                        placeholder="Enter New Name Of Category">
                                    </div>

                                  </div>

                                </form>
                              </div>


                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" form="UpdateCategories">Update
                                changes</button>
                            </div>
                          </div>
                        </div>
                      </div>



                      <a href="{{ url("/SkillsHub/Dashboard/Categories/Delete/$cat->id") }}" type="button"
                        class="btn bg-purple btn-flat margin">Delete
                        <i class="px-2t fa fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach ()
                </tbody>
              </table>
            </div>
            {{ $cats->links() }}
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
  
  $("#Edit-id").val(id);
  $("#Edit-name").val(name);
  });

// $(".Active").click(function () { 

//   })
</script>

@endsection