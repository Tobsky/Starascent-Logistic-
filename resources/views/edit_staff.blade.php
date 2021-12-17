@extends('layouts.index')

@section('title')
    Edit Staff | Star Ascent
@endsection

@section('content')
    <div class="container-fluid">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-2 d-none d-lg-block "></div>
                    <div class="col-lg-8 p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Edit Staff Account!</h1>
                        </div>

                        <form class="user content-justify-center" method="POST" action="/edit_staff" >
                            @csrf
                            <input type="hidden" name="id" value="{{$edit_staff['id']}}">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" 
                                        value="{{$edit_staff['firstname']}}" placeholder="First Name" required autocomplete="firstname" autofocus>

                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror    
                                </div>
                                <div class="col-sm-6">                                   
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" 
                                        value="{{$edit_staff['lastname']}}" placeholder="Last Name" required autocomplete="lastname" autofocus>

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
                                    value="{{$edit_staff['email']}}" placeholder="Email Address" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">                                   
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" 
                                    value="{{$edit_staff['phone_number']}}" placeholder="Phone Number" required autocomplete="phone_number" autofocus>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="form-group ">
                                <select  name="branch_id" id="" class="form-control">
                                <option selected value=""> Please Select Branch</option>
                                {{ <?php
                                    /* $branches = $conn->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as address FROM branches");
                                    while($row = $branches->fetch_assoc()):
                                ?>
                                <option value="<?php echo $row['id'] ?>" <?php echo isset($branch_id) && $branch_id == $row['id'] ? "selected":'' ?>> <?php echo $row['branch_code']. ' | '.(ucwords($row['address'])) ?></option>
                                */
                                <?php // endwhile; ?> }}
                                </select>
                            </div> --}}
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                        name="password" placeholder="Password" value="{{$edit_staff['password']}}" autocomplete="new-password">
                                        <small class=""><i>Leave this blank if you dont want to change this</i></small>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" 
                                        placeholder="Repeat Password" autocomplete="new-password">
                                    <small class=""><i>Leave this blank if you dont want to change this</i></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <button type="submit" class="btn btn-primary btn-user btn-block ">
                                        Register
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <a type="submit" class="btn btn-secondary btn-user btn-block " href="{{ url('staff_list') }}"> Cancel</a>
                                </div>
                                
                            </div>
                            

                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
                        </div>
                        
                    </div>
                    <div class="col-lg-2 d-none d-lg-block "></div>
                </div>
            </div>
        </div>

                
        {{-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="material-icons">&#xE876;</i>
                        </div>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center"><h4>Great!</h4>	
                        <p>Your account has been Updated successfully.</p>
                    </div>
                    
                </div>
            </div>
        </div>  --}}

    </div>    
@endsection