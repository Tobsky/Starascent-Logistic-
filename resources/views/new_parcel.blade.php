@extends('layouts.index')

@section('title')
    New Parcel | Star Ascent
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">New Parcel</h1>

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            
            <form class="user content-justify-center" method="POST" action="new_parcel" >
                @csrf
                <div class="row row-cols-1">    
                    <div class="col-md-6 pb-2 pt-5 px-5">
                        <div >
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Pick-up Information</h1>
                            </div>
                            
                                <div class="form-group">
                                        <input type="text" class="form-control @error('sender_name') is-invalid @enderror" 
                                            id="sender_name" placeholder="Senders Name" name="sender_name" value="" required>

                                        @error('sender_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror  
                                </div>
                                <div class="form-group">
                                        <input type="text" class="form-control @error('sender_address') is-invalid @enderror"
                                            id="sender_address" placeholder="Pickup address" name="sender_address" value="" required>

                                        @error('sender_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror  
                                </div>
                                <div class="form-group">
                                        <input type="tel" class="form-control @error('sender_contact') is-invalid @enderror"
                                            id="sender_contact" placeholder="Pickup mobile number" name="sender_contact" value="" required>

                                        @error('sender_contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                </div>
                                <div class="form-group">
                                        <select type="text" class="form-control" name="product_category" placeholder="Product Category" value="" required>
                                        
                                            <option value="Clothings and accessories">Clothings and accessories</option>
                                            <option value="Document" selected>Document</option>
                                            <option value="Food">Food</option>
                                            <option value="Electronics">Electronics</option>
                                            <option value="Daily neccessities">Daily neccessities</option>
                                            <option value="Other">Other</option>
                                        </select>
                                </div>

                        </div>
                    </div>
                    <hr class="d-md-none d-lg-none col-9 offset-1">
                    <div class="col-md-6 pb-2 pt-5 px-5">
                        <div>
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Recipient Information</h1>
                            </div>
                            <div class="user content-justify-center" >
                                <div class="form-group">
                                    <input type="text" class="form-control @error('recipient_name') is-invalid @enderror"
                                        id="recipient_name" placeholder="Recipients name" name="recipient_name" value="" required>

                                    @error('recipient_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('recipient_address') is-invalid @enderror"
                                        id="recipient_address" placeholder="Delivery address" name="recipient_address" value="" required>

                                    @error('recipient_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control @error('recipient_contact') is-invalid @enderror"
                                        id="recipient_contact" placeholder="Delivery mobile number" name="recipient_contact" value="" required>

                                    @error('recipient_contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 offset-1 col-md-10 offset-md-1 pb-3">
                        <textarea class="form-control" name="comment" id="" rows="3" placeholder="Request & Comments"></textarea>
                    </div>
                    
                </div>    
                <div class="form-group row offset-1">
                    <div class="col-5 mb-3 ml-3">
                        <button type="submit" class="btn btn-primary btn-user btn-block ">
                            Save
                        </button>
                    </div>
                    <div class="col-5 mb-3 mr-3 ">
                        <a type="submit" class="btn btn-secondary btn-user btn-block" href="{{ url('parcel_list') }}"> Cancel</a>
                    </div>
                    
                </div>
                    
            </form>
        </div>
    </div>
</div>
@endsection

