@extends('layouts.app')

@section('title')
    Register | Star Ascent
@endsection

@section('content')
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
    </div>
    <form class="user content-justify-center" method="POST" action="{{ route('register') }}" >
        @csrf

        <div class="form-group">
            
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror    
        </div>
        <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
                value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                name="password" placeholder="Password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>    
        <div class="form-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" 
                placeholder="Repeat Password" required autocomplete="new-password">

            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        

        <button type="submit" class="btn btn-primary btn-user btn-block">
            Register
        </button>

    </form>
    <hr>
    <div class="text-center">
        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
    </div>
    <div class="text-center">
        <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
    </div>
@endsection