@extends('layouts.index')

@section('title')
    New Staff | Star Ascent
@endsection

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Staff List</h1>


    <!-- DataTales Example -->
    <div class="card border-top-primary shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 float-right font-weight-bold text-primary">
          <a  href="{{ url('new_staff') }}"><i class="fa fa-plus"></i> Add New</a>
        </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
             @foreach ($staffs as $staff)
                <tr>
                  <td>{{$staff['id']}}</td>
                  <td>{{$staff['firstname']}}</td>
                  <td>{{$staff['lastname']}}</td>
                  <td>{{$staff['email']}}</td>
                  <td>{{$staff['phone_number']}}</td>
                  <td class="text-center">
                    <div class="btn-group">
                      <a href="{{"edit_staff/".$staff['id']}}" class="btn btn-primary btn-circle">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a class="btn btn-danger btn-circle" href="#" data-toggle="modal" data-target="#deleteStaffModal{{$staff->id}}">
                        <i class="fas fa-trash"></i>
                    </a>
                      {{-- <a href="{{"delete/".$staff['id']}}" class="btn btn-danger btn-circle">
                        <i class="fas fa-trash"></i>
                      </a> --}}
                    </div>
                  </td>
                  <!-- Delete Modal-->

                  <div class="modal fade" id="deleteStaffModal{{$staff->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Staff</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Delete" below if you are sure you want to delete <b>{{$staff->id}}</b> </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                
                                <a class="btn btn-danger" href="{{"delete_staff/".$staff['id']}}">
                                    Delete
                                </a>

                            </div>
                        </div>
                    </div>
                  </div>

                </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div>

     

  </div>
  <!-- /.container-fluid -->    
@endsection

