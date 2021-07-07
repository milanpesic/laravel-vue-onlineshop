@extends('layout.app')

@section('title', 'Sign In')

@section('content')

<div class="container">

    <div class="row justify-content-center mt-5 mb-5">

        <div class="text-center mb-5">
            <h1 class="fw-bold" style="font-size: 30px; text-shadow: 2px 2px 4px #000000;">RESET YOUR PASSWORD</h1>
            <small>Please insert your new password to connect to your account.</small>
        </div>  

        <div class="col-md-4 border p-3 rounded border border-2">

            <form action="{{ route('password.update') }}" method="post">

                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold @error('email') text-danger @enderror">Email</label>
                    <input type="email" name="email" class="form-control shadow-none @error('email') border border-danger border-2 @enderror">
                    
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" name="password" class="form-control shadow-none @error('password') border border-danger border-2 @enderror">

                    @error('password') 
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label fw-bold">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control shadow-none @error('password_confirmation') border border-danger border-2 @enderror">

                    @error('password_confirmation') 
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    
                </div>


                <div>
                    <button type="submit" class="btn btn-dark shadow-none fw-bold">Reset</button>
                </div>
                
                <hr/>
                
            </form>

        </div>

    </div>

</div>

@endsection