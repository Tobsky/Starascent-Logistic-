@extends('layouts.index')

@section('title')
    Parcel List | Star Ascent
@endsection

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Parcel List</h1>


    <!-- DataTales Example -->
    <div class="card border-top-primary shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 float-right font-weight-bold text-primary">
          <a  href="{{ url('new_parcel') }}"><i class="fa fa-plus"></i> Add New</a>
        </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Tracking Number</th>
                <th>Senders Name</th>
                <th>Recipients Name</th>
                <th>Status</th>
                <th>Product Category</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Tracking Number</th>
                <th>Senders Name</th>
                <th>Recipients Name</th>
                <th>Status</th>
                <th>Product Category</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($parcels as $parcel)
                <tr>
                  <td>{{$parcel->tracking_number}}</td>
                  <td>{{$parcel->sender_name}}</td>
                  <td>{{$parcel->recipient_name}}</td>
                  <td class="text-center">
                    @switch($parcel->status)
                        @case(1)
                            <span class='badge badge-pill badge-info'> Order Accepted by Courier</span>
                            @break
                        @case(2)
                            <span class='badge badge-pill badge-info'> Collected</span>
                            @break
                        @case(3)
                            <span class='badge badge-pill badge-info'> Shipped</span>
                            @break
                        @case(4)
                            <span class='badge badge-pill badge-primary'> In-Transit</span>
                            @break
                        @case(5)
                            <span class='badge badge-pill badge-primary'> Arrived At Destination</span>
                            @break
                        @case(6)
                            <span class='badge badge-pill badge-primary'> Out for Delivery</span>
                            @break
                        @case(7)
                            <span class='badge badge-pill badge-primary'> Ready to Pickup</span>
                            @break
                        @case(8)
                            <span class='badge badge-pill badge-success'> Delivered</span>
                            @break
                        @case(9)
                            <span class='badge badge-pill badge-success'> Picked-up</span>
                            @break
                        @case(10)
                            <span class='badge badge-pill badge-danger'> Unsuccessfull Delivery Attempt</span>
                            @break
                        @default
                        <span class='badge badge-pill badge-info'> Your order is been processed</span>
                    @endswitch  
                  </td>
                  <td>{{$parcel->product_category}}</td>
                  <td class="text-center">
                    <div class="btn-group">
                        <a href="#" class="btn btn-success btn-circle" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="View" data-target="#ViewParcelModal{{$parcel->id}}">
                          <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="btn btn-info btn-circle" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Update" data-target="#UpdateParcelModal{{$parcel->id}}">
                          <i class="fas fa-user-edit"></i>
                        </a>
                        <a href="{{"edit_parcel/".$parcel->id}}" class="btn btn-primary btn-circle" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Delete" data-target="#deleteParcelModal{{$parcel->id}}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                  </td>

                  <!-- Delete Modal-->
                  <form action="" method="POST" enctype="multipart/form-data">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal fade" id="deleteParcelModal{{$parcel->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Parcel</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">Select "Delete" below if you are sure you want to delete <b>{{$parcel->id}}</b> </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            
                            <a class="btn btn-danger" href="{{"delete_parcel/".$parcel->id }}">
                                Delete
                            </a>

                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  
                  <!-- View Parcel Modal -->
                  <div class="modal fade" id="ViewParcelModal{{$parcel->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Parcel Details</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body"> 
                          <div class="card border-left-primary shadow h-100 py-2 mb-1">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Tracking Number: 
                                  </div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800 mb-2">
                                    {{$parcel->tracking_number}}
                                  </div>
                                  <button class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="UpdateParcelModal{{$parcel->id}}">
                                    <span  class="icon text-white-50">
                                      <i class="fa fa-edit"></i>
                                    </span>
                                    <span class="text">Update Status</span> 
                                  </button>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-truck fa-2x text-gray-300"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card border-left-primary shadow h-100 py-2 mb-1">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Sender Information: 
                                  </div>
                                  <hr>
                                  <div class="h6 font-weight-bold text-primary text-uppercase mb-1">
                                    Name: 
                                  </div>
                                  <div class="text-xs mb-0 font-weight-bold text-gray-800 mb-2">
                                    {{$parcel->sender_name}}
                                  </div>
                                  <div class="h6 font-weight-bold text-primary text-uppercase mb-1">
                                    Address:
                                  </div>
                                  <div class="text-xs font-weight-bold text-gray-800 mb-2">
                                    {{$parcel->sender_address}}
                                  </div>
                                  <div class="h6 font-weight-bold text-primary text-uppercase mb-1">
                                    Phone Number: 
                                  </div>
                                  <div class="text-xs font-weight-bold text-gray-800 mb-2">
                                    {{$parcel->sender_contact}}
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card border-left-primary shadow h-100 py-2 mb-1">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Recipient Information: 
                                  </div>
                                  <hr>
                                  <div class="h6 font-weight-bold text-primary text-uppercase mb-1">
                                    Name: 
                                  </div>
                                  <div class="text-xs mb-0 font-weight-bold text-gray-800 mb-2">
                                    {{$parcel->recipient_name}}
                                  </div>
                                  <div class="h6 font-weight-bold text-primary text-uppercase mb-1">
                                    Address:
                                  </div>
                                  <div class="text-xs font-weight-bold text-gray-800 mb-2">
                                    {{$parcel->recipient_address}}
                                  </div>
                                  <div class="h6 font-weight-bold text-primary text-uppercase mb-1">
                                    Phone Number: 
                                  </div>
                                  <div class="text-xs font-weight-bold text-gray-800 mb-2">
                                    {{$parcel->recipient_contact}}
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>  
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Update status -->
                  
                    @csrf
                    <input type="hidden" name="id" value="{{$parcel->id}}">
                    <input type="hidden" name="tracking_number" value="{{$parcel->tracking_number}}">
                    <div class="modal fade" id="UpdateParcelModal{{$parcel->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Parcel: <b>{{$parcel->tracking_number}}</b> </h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form method="POST" action="parcel_list">
                            @csrf
                            <input type="hidden" name="id" value="{{$parcel->id}}">
                            <input type="hidden" name="tracking_number" value="{{$parcel->tracking_number}}">
                            <div class="modal-body">
                              
                              @php
                                $status_arr = array("Your order is been processed","Order Accepted by Courier","Collected","Shipped",
                                "In-Transit","Arrived At Destination","Out for Delivery","Ready to Pickup",
                                "Delivered","Picked-up","Unsuccessfull Delivery Attempt");
                              @endphp

                              <div class="form-group">
                                <select type="text" class="form-control" name="status" id="" value="">
                                  @foreach ($status_arr as $count => $status)
                                    <option value="{{$count}}" {{($count == $parcel->status) ? 'selected' : ''}}>
                                      {{$status}}
                                    </option>
                                  @endforeach
                                </select> 
                              </div>
                            </div>
                            <div class="modal-footer">
                              <div class="form-group">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-info" >Update</button>
                              </div>
                            </div>
                          </form>
                          
                          
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