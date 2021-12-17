@extends('layouts.index')

@section('title')
    Dashboard | Star Ascent
@endsection

@section('content')    
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Information Card Row -->
    <div class="row">

        <!-- (Total Branches) -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Branches 
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{-- <?php echo $conn->query("SELECT * FROM branches")->num_rows; ?> --}} {{$branches}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Parcels -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Parcels</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$parcels}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Staff -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Staff </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$staffs}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @php
            $status_arr = array("order in processing","Order Accepted by Courier","Collected","Shipped",
            "In-Transit","Arrived At Destination","Out for Delivery","Ready to Pickup",
            "Delivered","Picked-up","Unsuccessfull Delivery Attempt");
            
        @endphp

        @php
            foreach($statuses as $list){
            $lists[] = $list->status;
        }
        @endphp

        @foreach($status_arr as $k =>$v)
            {{-- {{total_parcels($k)}} --}}
            <!-- Parcel stages -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        {{$v}}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{-- Display the parcel status statistics --}}
                                        @php
                                            $indexes = array_keys($lists,$k);
                                            $number = count($indexes);
                                            echo $number;
                                        @endphp
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-bicycle fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        @endforeach
    </div>


</div>
<!-- /.container-fluid -->
@endsection