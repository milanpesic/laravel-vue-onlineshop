
<footer class="fs-5 p-5 rounded" style="margin-top: 100px; background: lightgrey">

        <div class="row d-flex justify-content-between">

            <div class="col-md-6 p-3 mt-3 fs-6 align-self-center">
                <newsletter 
                    :newsletter-route = "'{{ route('newsletter') }}'"
                    :newsletter-home-route = "'{{ route('home') }}'"
                    :newsletter-brand-image = "'{{ asset('images/online-shop.png') }}'"> 
                </newsletter>
            </div>

            <div class="col-md-auto p-3 mt-3 text-center">

                    <a href="https://www.facebook.com/" class="text-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                        </svg>
                    </a>
             
                    <a href="https://www.instagram.com/" class="ms-5 text-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                        </svg>
                    </a>
              
                    <a href="https://twitter.com/" class="ms-5 text-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                        </svg>
                    </a>
              
            </div>

        </div>

        <div class="row mb-5">

            <div class="col-md-auto mt-3 mb-5">

                <hr class="bg-dark">

                <div class="lead bg-dark text-warning rounded p-3 fst-italic">
                    
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Aenean facilisis arcu ac nisi vulputate, non venenatis augue bibendum.
                    Nunc fermentum diam non vulputate iaculis.
                    Aliquam tempor nulla vitae ligula viverra feugiat.
                    Cras rutrum nibh sed ligula efficitur, vitae vestibulum lectus eleifend.
            
                </div>

            </div>

            <div class="col-md-4 text-center mt-3">  

                    <h5 class="fw-bold btn btn-dark text-warning" style="width: 160px;">Links</h5>
                    <hr class="bg-dark">
                    <ul class="list-unstyled lead">
                        <li><a class="text-left text-muted" href="{{ route('home') }}">Home</a></li>
                        <li><a class="text-left text-muted" href="{{ route ('products') }}">Products</a></li>
                        <li><a class="text-left text-muted" href="{{ route ('about-us') }}">About</a></li>
                        <li><a class="text-left text-muted" href="{{ route('contact') }}">Contact</a></li>
                    </ul>
            </div>

            <div class="col-md-4 text-center mt-3">
                <h5 class="fw-bold btn btn-dark text-warning" style="width: 160px;">Resources</h5>
                <hr class="bg-dark">
                <ul class="list-unstyled lead">
                <li><a class="text-muted" href="https://www.php.net/">PHP</a></li>
                <li>
                    <a class="text-muted" href="https://getbootstrap.com/">
                        Bootstrap 
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bootstrap-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"/>
                        </svg>
                    </a>
                </li>

                <li><a class="text-muted" href="https://laravel.com/">Laravel</a></li>
                <li><a class="text-muted" href="https://vuejs.org/">Vue.js</a></li>
                <li><a class="text-muted" href="https://git-scm.com/">Git</a></li>
                
                </ul>

            </div>

            <div class="col-md-4">
               
                <div class="text-center mt-3">
                    <h5 class="fw-bold btn btn-dark text-warning" style="width: 160px;">Info</h5>
                </div>

                <hr class="bg-dark">

                <ul class="list-unstyled lead">
                <li>
                    <span class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                          </svg>
                        &nbsp 16000 Leskovac
                    </span>
                </li>
                <li>
                    <span class="text-muted">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-briefcase-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"/>
                            <path fill-rule="evenodd" d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5v1.384l-7.614 2.03a1.5 1.5 0 0 1-.772 0L0 5.884V4.5zm5-2A1.5 1.5 0 0 1 6.5 1h3A1.5 1.5 0 0 1 11 2.5V3h-1v-.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V3H5v-.5z"/>
                        </svg>
                        &nbsp 00 - 24h
                    </span>
                </li>
                <li>
                    <span class="text-muted">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"/>
                        </svg>
                    &nbsp +38116.123.456
                    </span>
                </li>
                <li>
                    <span class="text-muted">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                        </svg>
                        &nbsp onlineshop@example.com
                    </span>
                </li>
                </ul>
            
            </div>

        </div>

        <div class="row text-dark fw-bold" style="margin-top: 150px;"> 

            <div class="col-md-12 text-center">
            
                &copy; {{ date('Y') }} by&nbsp;
            
                <a class="text-muted" href="https://github.com/milanpesic" target="_blank">
                    Milan Pesic 
                </a>

            </div>
        
        </div>

</footer>