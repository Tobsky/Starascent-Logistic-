@extends('layouts.index')

@section('title')
    Track | Star Ascent
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Track Parcel</h1>

    <div class="col-md-12">
        <div class="card mb-4 py-3 border-bottom-primary">
            <form type="get" action="{{ url('/track_parcel/route') }}">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="d-flex w-100 px-1 my-3 justify-content-center align-items-center">
                        <label class="my-1"for=""><small>Tracking Number</small></label>
                        <div class="input-group col-10 col-md-5">
                            <input type="search" name="tracking_number" class="form-control form-control-sm bg-light" placeholder="STA000000000001" value="{{$tracking_number}}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-primary btn-gradient-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>  
        </div>
        
    </div>
    
        @forelse ($trackparcel as $parcel)
            <div class="row">
                <div class="col-2 col-md-2" >
                    <span class="float-right btn btn-primary btn-circle btn-sm mt-3 ml-5" >
                        <i class="fas fa-box"></i>
                    </span>
                </div>
                <div class="col-9 col-md-8">
                    <div class="card " >
                        <div class="card-body">
                            @switch($parcel->status)
                                @case(1)
                                    <span> <small>Order Accepted by Courier</small></span>
                                    @break
                                @case(2)
                                    <span> <small>Collected</small></span>
                                    @break
                                @case(3)
                                    <span> <small>Shipped</small></span>
                                    @break
                                @case(4)
                                    <span> <small>In-Transit</small></span>
                                    @break
                                @case(5)
                                    <span> <small>Arrived At Destination</small></span>
                                    @break
                                @case(6)
                                    <span> <small>Out for Delivery</small></span>
                                    @break
                                @case(7)
                                    <span> <small>Ready to Pickup</small></span>
                                    @break
                                @case(8)
                                    <span> <small>Delivered</small></span>
                                    @break
                                @case(9)
                                    <span> <small>Picked-up</small></span>
                                    @break
                                @case(10)
                                    <span> <small>Unsuccessfull Delivery Attempt</small></span>
                                    @break
                                @default
                                    <span> <small>Your order is been processed</small></span>
                            @endswitch
                            <span class="float-right"> 
                                <small><i class="fas fa-clock "></i></small> 
                                <small>{{$parcel->created_at}}</small>
                            </span>
                        </div>
                    </div>           
                </div>
                <div class="col-1 col-md-2">
                    
                </div>
            </div>
        @empty
            <p class="text-center">Search results not found for <strong>{{$tracking_number}}</strong></p>
        @endforelse
    
</div>
@endsection