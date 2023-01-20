@extends('layouts.out')

@section('content')
<div class="container">
    @if($isExpired)
        <div class="row justify-content-center mt-7">
            <div class="col-md-4 p-5">
                <div class="card shadow">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{-- <img src="{{ URL::asset('img/company/logo.png') }}" class="card-img-top" alt="..."> --}}
                    <div class="row justify-content-center">
                        <div class="border border-3 border-primary p-2 col-3 text-center mt-5 rounded-3 shadow">
                            <i class="fa-solid fa-clock fs-3 text-primary"></i>
                            <span class="fs-6 text-primary">Expired</span>
                        </div>
                    </div>
                    <div class="card-body rounded-2 text-center px-3 py-4">
                        <h3>Your Create Password Link has Expired.</h3>
                        <p class="fw-lighter">
                            Please click "Create New Password Creation Link" button to generate new Create Password Link.
                        </p>
                        <form id="sendResetLink">
                            @csrf
                            <input id="sendResetEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $_GET['email'] }}" required autocomplete="email" autofocus style="display:none">
                            <button type="submit" class="btn account-btn">Create New Password Creation Link</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="row justify-content-center mt-6">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header login-header-bg text-center">
                    <h3 class="pt-2">{{ __('Create Password') }}</h3>
                </div>

                <div class="card-body p-4">
                    <form id="registerPassword">
                        @csrf

                        <input id="createPassToken" type="hidden" name="token" value="{{ $token }}">


                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="email" class="col-md-4 col-form-label">{{ __('User Name') }}</label>
                                    <div class="input-group">
                                        <span class="p-2 user-icon input-group-text" id="email">
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        <input id="createPassUsername" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->user_name }}" required autofocus readonly>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>
                                    <div class="input-group">
                                        <span class="p-2 user-icon input-group-text" id="email">
                                            <i class="fa-solid fa-envelope"></i>
                                        </span>
                                        <input id="createPassEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus readonly>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus readonly>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                                    <div class="input-group">
                                        <span class="p-2 user-icon input-group-text">
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                        <input id="password" type="password" class="form-control  create-pass-fields @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        <span class="show-width" id="eye_view">
                                            <i class="fa-solid fa-eye" id="show_eye"></i>
                                            <i class="fa-solid fa-eye-slash d-none" id="hide_eye"></i>
                                        </span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress">
                            <div id="strength" class="progress-bar bg-danger" role="progressbar" aria-label="Example with label" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        <div class="row px-4">
                            <div id="passError">
                                <div id="upper" class="user-select-none"><span id="upperTag"> </span> At Least One Upper Case</div>
                                <div id="lower" class="user-select-none"><span id="lowerTag"> </span> At Least One Lower Case </div>
                                <div id="special" class="user-select-none"><span id="specialTag"> </span> At Least One Special Character Or Symbol</div>
                                <div id="numeric" class="user-select-none"><span id="numTag"> </span> At Least One Number</div>
                                <div id="charLength" class="user-select-none"><span id="charTag"> </span> At Least 8 Characters</div>
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}


                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>
                                    <div class="input-group">
                                        <span class="p-2 user-icon input-group-text">
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                        <input id="repPassword" type="password" class="form-control create-pass-fields" name="password_confirmation" required autocomplete="new-password">
                                        <span class="show-width" id="eye_view_2">
                                            <i class="fa-solid fa-eye" id="show_eye_2"></i>
                                            <i class="fa-solid fa-eye-slash d-none" id="hide_eye_2"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="notMatch" style="display: none">Passwords do not match</div>

                        {{-- <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

                        <div class="form-group text-center mb-3">
                            <button id="createPassword" type="submit" class="btn account-btn" disabled>
                                {{ __('Create Password') }}
                            </button>
                        </div>

                        {{-- <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Password') }}
                                </button>
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
