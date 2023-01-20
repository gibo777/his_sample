@extends('layouts.out')

@section('content')

<div class="container">
    <div class="row justify-content-center mt-8 p-3">
        <div class="col-md-4">
            <div class="card shadow">
                {{-- <div class="card-header text-center py-3 h4 login-header-bg"> --}}
                <h3 class="pt-3 text-center">{{ __('Forgot your password?') }}</h3>
                {{-- </div> --}}
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form id="sendPasswordResetEmailLink">
                        @csrf
                        <div class="row justify-between border-bottom">
                            <p class="lh-base text-center">
                                Kindly provide your Username or Email Address and we will send you an email with a link to reset your password.
                            </p>
                        </div>  
                        <div class="row mb-3 d-block pt-3 px-2">
                            {{-- <label for="email" class="col col-form-label">{{ __('Email Address or Username') }}</label> --}}

                            <div class="col d-block">
                                <input id="emailToBeReset" type="text" class="form-control radius-left radius-right @error('email') is-invalid @enderror" name="email" placeholder="Email Address or Username" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 mx-1 mb-3 pt-1">
                                <button type="submit" class="btn new-btn radius-left radius-right">
                                    {{ __('Confirm') }}
                                </button>
                        </div>
                        <div class="row mb-0 mx-1 mb-3 pt-1">
                            <button type="button" class="btn btn-danger radius-left radius-right" onclick="(function(){

                                window.location.href = '/';
                             })()">
                                {{ __('Cancel') }}
                            </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="text-center">
  <!-- Copyright -->
  <div class="text-center">
              <div class="profile_name">&#169; {{ config('app.name') }} </div>
  </div>
  <!-- Copyright -->
</footer>
@endsection
