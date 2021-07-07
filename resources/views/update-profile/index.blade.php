@extends('layout.app')

@section('title', 'Update Profile')

@section('content')

<div class="container">

        <div class="row d-flex justify-content-center mt-5 mb-5">
            
            <div class="col-md-10">
                
                <div class="text-center">
                        
                    <h1>Update your profile</h1>

                    <small>Here you can change and update your profile photo, name, username and password</small>
                    
                </div>

            </div>
            
        </div>

        <form action="{{ route('update.profile') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="row d-flex justify-content-center mt-5">

            <div class="col-md-4 border border-5 p-3 bg-light">
                <h3 class="mb-3">Profile Info:</h3>
                <div><span class="fw-bold">Username:</span> <span class="fw-light fst-italic">{{ auth()->user()->username }}</span></div> 
                <div><span class="fw-bold">Name:</span> <span class="fw-light fst-italic">{{ auth()->user()->name }}</span></div> 
                <div><span class="fw-bold">Gender:</span> <span class="fw-light fst-italic">{{ auth()->user()->gender }}</span></div> 
                <div><span class="fw-bold">Email:</span> <span class="fw-light fst-italic">{{ auth()->user()->email }}</span></div> 
                <div><span class="fw-bold">Registered:</span> <span class="fw-light fst-italic">{{ auth()->user()->email_verified_at->format('H:i a, d M Y') }}</span></div> 
            </div>

            <div class="col-md-4 border border-5 p-3 bg-light">

              
                <h3 class="mb-3">Update your image:</h3>
                    <div class="col-md-auto text-center mb-3">
                        <img src="{{ auth()->user()->profile_image ? Storage::url(auth()->user()->profile_image) : Storage::url('public/profile-images/blank-avatar.png') }}" class="img-thumbnail" alt="">
                    </div>

                <div class="col-md-auto">
                    <label for="avatar" class="form-label"> Select image to upload <sup>(max:300*300)</sup>: </label>
                    <input type="file" name="avatar" class="form-control shadow-none" value="{{ old('avatar') }}">

                    @error('avatar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                @if(auth()->user()->profile_image)

                    <div class="mt-3">
                        <a class="btn btn-sm btn-danger shadow-none" href="{{ route('remove.profile.image') }}">Remove profile image</a>
                    </div>

                @endif

            </div>

        </div>
        
        <div class="row d-flex justify-content-center mb-5">

            <div class="col-md-4 border border-5 p-3">

                <div class="form-group mb-4">

                    <label for="username" class="fw-bold">Update Username</label>

                    <input type="text" class="form-control shadow-none fst-italic" name="username" value="{{ auth()->user()->username }}" placeholder="">

                    <div>
                        <p>
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </p>
                    </div>

                </div>

                <div class="form-group mb-4">

                    <label for="name" class="fw-bold">Update Name</label>

                    <input type="text" class="form-control shadow-none fst-italic" name="name" value="{{ auth()->user()->name }}" placeholder="">

                    <div>
                        <p>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </p>
                    </div>

                </div>

            </div>

            <div class="col-md-4 border border-4 p-3">

                <div class="form-group mb-4">

                    <label for="password" class="fw-bold">Current Password</label>

                        <div class="input-group mb-2">
    
                            <input type="password" class="form-control shadow-none" name="password" id="password" value="{{ old('password') }}">
   
                                <button class="btn btn-light border shadow-none d-flex align-items-center" onclick="toggleEye('password', 'openEye', 'closeEye')" type="button">
   
                                    <svg id="closeEye" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299l.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                                        <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709z"/>
                                        <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                    </svg>

                                    <svg id="openEye" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="display: none">
                                        <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                        <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>

                                </button>

                        </div>
                    
                    <div>
                        <p>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </p>
                    </div>

                </div>

                <div class="form-group mb-4">

                    <label for="newPassword" class="fw-bold shadow-none">New Password</label>

                        <div class="input-group mb-2">
    
                            <input type="password" class="form-control shadow-none" name="newPassword" id="newPassword"  value="{{ old('newPassword') }}">
    
                                <button class="btn btn-light border shadow-none d-flex align-items-center" onclick="toggleEye('newPassword', 'openEye1', 'closeEye1')" type="button">
   
                                    <svg id="closeEye1" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299l.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                                        <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709z"/>
                                        <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                    </svg>

                                    <svg id="openEye1" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="display: none">
                                        <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                        <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>

                                </button>

                        </div>

                    <div>
                        <p>
                            @error('newPassword')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </p>
                    </div>

                </div>

                <div class="form-group mb-4">

                    <label for="repeatPassword" class="fw-bold shadow-none">New Password Repeat</label>

                    <div class="input-group mb-2">
    
                        <input type="password" class="form-control shadow-none" name="newPassword_confirmation" id="repeatPassword">
       
                                <button class="btn btn-light border shadow-none d-flex align-items-center" onclick="toggleEye('repeatPassword', 'openEye2', 'closeEye2')" type="button">
   
                                    <svg id="closeEye2" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299l.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                                        <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709z"/>
                                        <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                    </svg>

                                    <svg id="openEye2" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="display: none">
                                        <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                        <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>

                                </button>
  
                    </div>

                    <div>
                        <p>
                            @error('repeatPassword')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </p>
                    </div>

                </div>

                <button type="submit" class="btn btn-dark shadow-none">Update</button>
            
            </div>

        </div>

    </form>
   
</div>

<script>

    function toggleEye(inputID, openID, closeID) {

        input = document.getElementById(inputID);
        open = document.getElementById(openID);
        close = document.getElementById(closeID);

        if (input.type === "password") {
            input.type = "text";
            close.style.display = "none";
            open.style.display = "block";   
        } else {
            input.type = "password";
            open.style.display = "none";
            close.style.display = "block";  
        }

    }
    
</script>

@endsection

