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
                            <input type="search" name="tracking_number" class="form-control form-control-sm bg-light" placeholder="STA000000000001" value="">
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
    
</div>
@endsection