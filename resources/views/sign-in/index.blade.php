@extends('layout.app')

@section('title', 'Sign In')

@section('content')

<div class="container">

    <div class="row justify-content-center mt-5 mb-5">

        <div class="text-center mb-5">
            <h1 class="fw-bold" style="font-size: 30px; text-shadow: 2px 2px 4px #000000;">SIGN IN</h1>
            <small>Don't have an account yet? <a href="{{ route('sign-up') }}">Sign Up</a></small>
        </div>  

        <div class="col-md-4 border p-3 rounded border border-2">

            @if (session('sign-in-failed'))

                <div class="alert alert-secondary col-md-auto p-3 border text-center">

                     <small class="fw-bold">{{ session('sign-in-failed') }}</small>   

                </div>
        
            @endif

            @if (session('status'))

                <div class="alert alert-warning col-md-auto p-3 border">

                     <small class="fw-bold">{{ session('status') }}</small>   

                </div>
        
            @endif

            @if (session('email-verify-send'))

                <div class="alert alert-primary col-md-auto p-3 border">

                     <small class="fw-bold">{{ session('email-verify-send') }}</small>   

                </div>
        
            @endif

            @if (session('email-verify-failed'))

                 <email-verify
                    :url = "'{{ route('verification.send') }}'"
                    :email = "'{{ session('email-verify-failed') }}'">
                 </email-verify>

            @endif

            @if(session('account-verified-success')) 

                <div class="alert alert-warning text-center fw-bold">

                    {{ session('account-verified-success') }}

                </div>

            @endif

            <form action="{{ route('sign-in') }}" method="post">

                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold @error('email') text-danger @enderror">Email</label>
                    <input type="email" name="email" class="form-control shadow-none @error('email') border border-danger border-2 @enderror" value="test@test.com">
                    
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-bold @error('password') text-danger @enderror">Password</label>
                    <input type="password" name="password" class="form-control shadow-none @error('password') border border-danger border-2 @enderror" value="test12345">

                    @error('password') 
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    
                </div>

                <div>
                    <button type="submit" class="btn btn-dark shadow-none fw-bold">Sign In</button>
                </div>
                
                <hr/>

                <div class="row justify-content-between">

                    <div class="col-md-auto">
                        <div class="form-check">
                            <input class="form-check-input shadow-none" name="remember_me" type="checkbox" value="">
                            <label class="text-dark fw-bold" for="remember_me">
                              Remember me
                            </label>
                        </div>
                    </div>

                    <forgotten-password></forgotten-password>
                    
                </div>
                
            </form>

        </div>

    </div>

</div>

@endsection