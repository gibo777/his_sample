@extends('layouts.app')

@section('content')

<div class="container mt-5" style="height: 600px;">
    <div class="row justify-content-center login-div">
        {{-- BULLETIN BOARD START --}}
        <div class="col-md-8 px-0 py-0 h-100 carousel-container">
            <div class="card shadow-lg">
                {{-- <div class="card-header text-center login-header-bg">
                    <h3 class="pt-2">{{ __('BULLETIN BOARD') }}</h3>
                </div> --}}
                {{-- CAROUSELL START --}}
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" ></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" hidden></li>
                  </ol>

                  
                  <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000" style="height: 600px !important;">
                      <img src="{{ asset('img/carousel/1.jpg') }}" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="10000" style="height: 600px !important;">
                      <img src="{{ asset('img/carousel/2.jpg') }}" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="10000" style="height: 600px !important;">
                      <img src="{{ asset('img/carousel/3.jpg') }}" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="10000" style="height: 600px !important;">
                      <img src="{{ asset('img/carousel/4.jpg') }}" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="10000" style="height: 600px !important;">
                      <img src="{{ asset('img/carousel/5.jpg') }}" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="10000" style="height: 600px !important;">
                      <img src="{{ asset('img/carousel/6.jpg') }}" class="d-block w-100 h-100" alt="...">
                    </div>
                  </div>
                  {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button> --}}

                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>

                  {{-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a> --}}
                  
                  {{-- <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a> --}}
                </div>
                {{-- CAROUSELL END --}}
            </div>
        </div>

        {{-- BULLETIN BOARD END --}}



        <div class="col-md-4">
            <div class="">
                <div class="card-header text-center">
                    <img src="{{ URL::asset('img/company/logo.png') }}" class="card-img-top w-50" alt="...">
                    {{-- <h3 class="pt-2">{{ __('Login') }}</h3>
                    <span>Access to our dashboard</span> --}}
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="email" class="form-label fw-bold">{{ __('Username') }}</label>
                                    <div class="input-group shadow-lg rounded">
                                        <span class="input-group-text radius-left user-icon" id="email">
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        <input id="username" type="text" class="form-control radius-right form-fields" name="username" value="{{ old('username') }}" placeholder="Enter username" required autocomplete="username" autofocus>
                                        
                                        {{-- @error('username')
                                            <span class="invalid-feedback bg-transparent-cust" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="userName" class="form-label">{{ __('Username') }}</label>
                                    <div class="input-group">
                                        <span class="p-2 user-icon input-group-text" id="email">
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        <input id="userName" name="userName" type="text" class="form-control form-fields @error('userName') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter Username" required autocomplete="userName" autofocus>
                                        
                                        @error('userName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group my-3">
                            <div class="row">
                                <div class="col">
                                    <label for="password" class="form-label fw-bold">{{ __('Password') }}</label>
                                    <div class="input-group shadow-lg bg-body border-radius-25">
                                        <span class=" user-icon input-group-text radius-left">
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                        <input id="password" type="password" class="form-control form-fields @error('password') is-invalid @enderror" placeholder="Enter password" name="password" required autocomplete="current-password">
                                        <span class="show-width radius-right pt-2" id="eye_view">
                                            <i class="fa-solid fa-eye" id="show_eye"></i>
                                            <i class="fa-solid fa-eye-slash d-none" id="hide_eye"></i>
                                        </span>
{{--    
                                        <i class="fa-sharp fa-solid fa-eye"></i>
                                        <i class="fa fa-eye hover" id="show_eye"></i>
                                        <i class="fa fa-eye-slash d-none" id="hide_eye"></i> --}}
                                    </div>
                                    @error('username')
                                    <span class="text-danger bg-light" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 col-auto text-center">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-decoration-none fw-bold" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group text-center">
                            <button type="submit" class="btn account-btn radius-left radius-right text-white" id="loginBtn">
                                {{ __('Login') }}
                            </button>
                        </div>
                        {{-- <div class="account-footer">
                            <span>{{env('APP_NAME')}}</span>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
