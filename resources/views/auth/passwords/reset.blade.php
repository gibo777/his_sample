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
                        <h3>Your reset link has expired.</h3>
                        <p class="fw-lighter">
                            Please click "Create New" button to generate new reset link.
                        </p>
                        <form id="sendResetLink">
                            @csrf
                            <input id="sendResetEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $_GET['email'] }}" required autocomplete="email" autofocus style="display:none">
                            <button type="submit" class="btn account-btn">Create New Reset Link</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
            <div class="card shadow">
                {{-- <div class="card-header text-center login-header-bg">
                    <h3 class="pt-2">{{ __('Reset Password') }}</h3>
                </div> --}}
                <h2 class="pt-3 text-center">{{ __('Change Password') }}</h2>
                <div class="card-body w-full">
                    <form id="resetPasswordForm">
                        @csrf
                        <input id="requestToken" type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col">
                                    {{-- <label for="fullName" class="col-md-4 col-form-label">{{ __('Full Name') }}</label> --}}
                                    <div class="input-group">
                                        <input id="fullName" name="fullName" type="text" class="form-control radius-left radius-right @error('fullName') is-invalid @enderror" value="Name:&nbsp;Full Name" required autocomplete="off" autofocus readonly>

                                        @error('fullName')
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
                                    {{-- <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label> --}}
                                    <div class="input-group">
                                        <span class="p-2 user-icon input-group-text radius-left" id="email">
                                            <i class="fa-solid fa-envelope"></i>
                                        </span>
                                        <input id="resetPasswordEmail" type="email" class="form-control radius-right @error('email') is-invalid @enderror" name="email" value="{{ $email }}" content="{{ $email }}" required autocomplete="email" autofocus readonly/>

                                        @error('email')
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
                                    <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                                    <div class="input-group border-radius-25">
                                        <span class="p-2 user-icon input-group-text radius-left">
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                        <input id="password" type="password" class="create-pass-fields form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        <span class="show-width radius-right" id="eye_view">
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

                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="password-confirm" class="col-md-12 col-form-label">{{ __('Confirm Password') }}</label>
                                    <div class="input-group border-radius-25">
                                        <span class="p-2 user-icon input-group-text radius-left">
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                        <input id="repPassword" type="password" class="create-pass-fields form-control" name="password_confirmation" required autocomplete="new-password">
                                        <span class="show-width radius-right" id="eye_view_2">
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
                                <input id="repPassword" type="password" class="create-pass-fields form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

                        <div class="row mb-0">
                            <div class="form-group text-center mb-3">
                                <button id="createPassword" type="submit" class="btn account-btn radius-left radius-right" disabled>
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<footer class="text-center">
  <!-- Copyright -->
  <div class="text-center">
              <div class="profile_name">&#169; {{ config('app.name') }} </div>
  </div>
  <!-- Copyright -->
</footer>
@endsection
