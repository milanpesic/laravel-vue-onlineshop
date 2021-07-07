@extends('layout.app')

@section('title', 'Contact')

@section('content')

<div class="container">

    <div class="text-center mt-5 mb-5">
        <h3 class="fw-bold">CONTACT US</h3>
        <small>Write us what you think using the form bellow.</small>
    </div> 

    <div class="row d-flex justify-content-evenly mb-5 rounded" style="margin-top: 100px;">
        <div class="col-md-4 fs-5 d-flex flex-column">
            <table class="table table-sm table-borderless border border-5 table-warning text-center">
                <tr class="table-secondary">
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 20 20">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                        </svg>
                        <span class="fw-bold ms-2 p-0">Address</span>
                    </td>
                </tr>
                <tbody>
                    <tr><td>123 St. Great Place</td></tr>
                    <tr><td>Leskovac</td></tr>
                    <tr><td>Serbia</td></tr>
                </tbody>
            </table>
        
            <table class="table table-sm table-borderless mt-3 border border-5 table-warning text-center">
                <tr class="table-secondary">
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                        </svg>
                        <span class="fw-bold ms-2 p-0">Lets Talk</span>
                    </td>
                </tr>
                <tbody>
                    <tr><td>123-456-789</td></tr>
                </tbody>
            </table>
        
            <table class="table table-sm table-borderless mt-3 border border-5 table-warning text-center">
                <tr class="table-secondary">
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 20 20">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                        </svg>
                        <span class="fw-bold ms-2 p-0">General Support</span>
                    </td>
                </tr>
                <tbody>
                    <tr><td>contact@onlineshop.com</td></tr>
                </tbody>
            </table>
        </div>
    
        <div class="col-md-6 fs-5">
           
                <form action="{{ route('contact', ['#contact-form']) }}" method="post" id="contact-form">
                    @csrf
                    
                    <div class="input-group">
                        <span class="input-group-text text-muted @error('name') border border-danger @enderror">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg>
                        </span>
                        <input type="text" class="form-control rounded-0 shadow-none fs-5 fw-bold @error('name') border border-danger @enderror" name="name" value="{{ old('name') }}" placeholder="Name" autofocus>
                    </div>

                    <div class="mb-3">
                        @error('name')
                                <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="input-group">
                        <span class="input-group-text text-muted @error('email') border border-danger @enderror">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                            </svg>
                        </span>
                        <input type="email" class="form-control rounded-0 shadow-none fs-5 fw-bold @error('email') border border-danger @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
                    </div>

                    <div class="mb-3">
                        @error('email')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <textarea name="message" class="form-control rounded-0 shadow-none fs-5 fw-bold @error('message') border border-danger @enderror" cols="30" rows="8" placeholder="Message">{{ old('message') }}</textarea>
                    </div>

                    <div class="mb-3">
                        @error('message')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-dark fs-5 fw-bold shadow-none col-md-5">Send</button>

                </form>

        </div>

    </div>

</div>

@endsection