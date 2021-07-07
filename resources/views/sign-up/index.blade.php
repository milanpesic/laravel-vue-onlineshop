@extends('layout.app')

@section('title', 'Sign Up')

@section('content')

<div class="container">

    <div class="row justify-content-center mt-5 mb-5">

        @if (session('sign-up-success'))

            <div class="alert alert-success col-md-auto p-3 border">

                    {!! session('sign-up-success') !!}

            </div>
        
        @else

            <div class="text-center mb-5">
                <h1 class="fw-bold" style="font-size: 30px; text-shadow: 2px 2px 4px #000000;">SIGN UP</h1>
                <small>Already have an account? <a href="{{ route('sign-in') }}">Sign In</a>.</small>
            </div>  

            <div class="col-md-4 border p-3 rounded border border-2">

                <form action="{{ route('sign-up') }}" method="post">

                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold @error('name') text-danger @enderror">Name</label>
                        <input type="text" name="name" class="form-control shadow-none @error('name') border border-danger border-2 @enderror" value="{{ old('name') }}">
                        
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold">Username</label>
                        <input type="text" name="username" class="form-control shadow-none @error('username') border border-danger border-2 @enderror" value="{{ old('username') }}">
                        
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control shadow-none @error('email') border border-danger border-2 @enderror" value="{{ old('email') }}">
                        
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                    <div class="mb-3">     
                        <label for="gender" class="form-label fw-bold">Gender</label>
                        <select class="form-control shadow-none @error('gender') border border-danger border-2 @enderror" name="gender" id="gender" value="{{ old('gender') }}">
                            <option class="fw-light" value="">Please select:</option>
                            <option {{ old('gender') == "male" ? "selected" : "" }} class="fw-bold" value="male">Male</option>
                            <option {{ old('gender') == "female" ? "selected" : "" }} class="fw-bold" value="female">Female</option>
                        </select>
                            @error('gender')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                    </div>


                    <div class="mb-3">

                        <label for="avatar" class="form-label fw-bold"> Profile Image <span class="small">(300*300)</span></label>
                        <input type="file" name="avatar" class="form-control shadow-none @error('avatar') border border-danger border-2 @enderror">

                        @error('avatar') 
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

                    <hr>

                    <div>
                        <button type="submit" class="btn btn-dark shadow-none fw-bold">Sign Up</button>
                    </div>

                </form>

            </div>

        @endif

    </div>

</div>

@endsection