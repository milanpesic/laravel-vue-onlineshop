
<nav class="navbar navbar-expand-lg navbar-light rounded" style="background: lightgrey;">
    <div class="container-fluid">
      
      <div class="d-none d-lg-block d-xl-block d-xxl-block">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" fill="currentColor" class="bi bi-shop text-dark" viewBox="0 0 16 16">
          <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
        </svg>
      </div>

      <button class="navbar-light navbar-toggler border-0 bg-light shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
       
      <a class="navbar-brand align-self-center" href="{{ route('home') }}"><img src="{{ asset('images/online-shop.png') }}" width="120" alt=""></a>
    
          <form action="{{ route('search') }}" method="post" class="d-none d-lg-block d-xl-block d-xxl-block">
            @csrf
            <div class="input-group input-group-sm">
              <input class="form-control border border-3 border-dark shadow-none fw-bold" type="search" name="search" size="50" placeholder="@error('search') {{ $message }} @else {{ 'Search' }} @enderror">
              <button class="btn btn-dark fw-bold col-2 shadow-none" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 20 20">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
              </button>
            </div>
          </form>
     
          <ul class="nav ms-auto">
            @auth
              <div class="dropdown me-1">

                <button class="btn btn-light border-0 rounded dropdown-toggle shadow fw-bold" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"> 
                  <span class="p-1">
                    <img src="{{ auth()->user()->profile_image ? Storage::url(auth()->user()->profile_image) : Storage::url('public/profile-images/blank-avatar.png') }}" class="rounded-3" width="30" alt="" title="{{ auth()->user()->name }}">
                  </span>
                  <span class="small">
                    {{ auth()->user()->name }}
                  </span class="p-1">
                </button>

                <div class="dropdown-menu w-100 fs-5 bg-light p-0 border-0 rounded-0 shadow" aria-labelledby="dropdownMenuButton2">
                  
                  <!--
                  <div class="">
                    <div class="">
                        <div><span class="fw-bold">Username:</span> <span class="fw-light fst-italic">{{ auth()->user()->username }}</span></div>                     
                        <div><span class="fw-bold">Name:</span> <span class="fw-light fst-italic">{{ auth()->user()->name }}</span></div>                     
                        <div><span class="fw-bold">Email:</span> <span class="fw-light fst-italic">{{ auth()->user()->email }}</span></div>            
                    </div>
                    <img src="{{ auth()->user()->profile_image ? Storage::url(auth()->user()->profile_image) : Storage::url('public/profile-images/blank-avatar.png') }}" class="img-thumbnail" width="100" alt="">
                  </div>
                  <hr>
-->
                      <a href="{{ route('order.summary') }}" class="dropdown-header dropdown-item fw-bold shadow-sm">Shopping History</a>
                      <a href="{{ route('update.profile') }}" class="dropdown-header dropdown-item fw-bold shadow-sm">Update Profile</a>
                      <form action="{{ route('sign-out') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-header dropdown-item fw-bold shadow-sm">Sign Out</button>
                      </form>

                </div>
              </div>

            @endauth
          
            @guest
            <!--
              <li class="nav-item text-center p-1 align-self-center small d-none d-lg-block d-xl-block d-xxl-block">
                <a class="text-decoration-none text-dark shadow-none fw-bold {{ Route::is('sign-in') ? 'active' : '' }}" href="{{ route('sign-in') }}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right-square-fill" viewBox="0 0 20 20">
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4v8z"/>
                  </svg>
                  <span>SIGN IN</span> 
                </a>
              </li>
            
              <li class="nav-item text-center p-1 align-self-center small d-none d-lg-block d-xl-block d-xxl-block">
                <a class="text-decoration-none text-dark shadow-none fw-bold {{ Route::is('sign-up') ? 'active' : '' }}" href="{{ route('sign-up') }}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 20 20">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                  </svg>
                  <span>SIGN UP</span> 
                </a>
              </li>
            -->

            <li class="nav-item p-1 me-1">
              <a class="text-decoration-none text-dark shadow-none fw-bold {{ Route::is('sign-in') ? 'active' : '' }}" href="{{ route('sign-in') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                </svg>
              </a>  
            </li>
          
            @endguest

            <li class="nav-item p-1">
              <a class="text-dark {{ Route::is('cart.show') ? 'active fw-bold' : '' }}" href="{{ route('cart.show') }}">
                
                <cart-count :cart="{{ json_encode($cart) }}" :total={{ $total }}></cart-count>  
                <!--
  
                @if(!empty($cart))
                 <sup class="badge bg-success rounded-pill">{{ count($cart) }}</sup>  
                @else     
                  <sup class="badge bg-danger rounded-pill">0</sup>  
                @endif   
  
                -->
              </a>
            </li>
          
          </ul>
    </div>
  </nav>

  <nav class="navbar navbar-expand-lg navbar-dark p-0 rounded">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse fw-bold" id="navbarNav">
        <ul class="nav">
          <li class="nav-item p-1">
            <a class="nav-link text-dark text-center {{ Route::is('home') ? 'active fw-bold border-bottom border-5' : '' }}" href="{{ route('home') }}">HOME</a>
          </li>
          <dropdown-menu
                  :ractive = "'nav-link text-dark text-center {{ Route::is('products', 'product', 'category.show', 'category.subcategory.show') ? 'active fw-bold border-bottom border-5' : '' }}'"
                  :categories="{{ $categories }}"
                  :category-show="'{{ route('category.show', ['']) }}'"
                  :subcategory-show="'{{ route('category.subcategory.show', ['', '']) }}'"
                  :product-show="'{{ route('products') }}'">
          </dropdown-menu>  
          <li class="nav-item p-1">
            <a class="nav-link text-dark text-center {{ Route::is('about-us') ? 'active fw-bold border-bottom border-5' : '' }}" href="{{ route('about-us') }}">ABOUT US</a>
          </li>
          <li class="nav-item p-1">
            <a class="nav-link text-dark text-center {{ Route::is('contact') ? 'active fw-bold border-bottom border-5' : '' }}" href="{{ route('contact') }}">CONTACT</a>
          </li>
        </ul>
        <form action="{{ route('search') }}" method="post" class="d-block d-sm-block d-md-block d-lg-none mt-3">
          @csrf
          <div class="input-group">
            <input class="form-control border border-3 shadow-none fw-bold" type="search" name="search" size="50" placeholder="@error('search') {{ $message }} @else {{ 'Search' }} @enderror">  
          </div>
        </form>
      
      </div>
   
  </nav>