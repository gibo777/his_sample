@extends('layouts.app')
@section('content')
<div id="main">
    <div id="contentContainer">
        <div class="container-fluid">    
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card shadow">
                        {{-- <div class="card-header">{{ __('Register') }}</div> --}}
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
        
                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="userName" class="col-md-4 col-form-label">{{ __('Username') }}</label>
                                            <div class="input-group">
                                                <span class="p-2 user-icon input-group-text" id="email">
                                                    <i class="fa-solid fa-user"></i>
                                                </span>
                                                <input id="userName" type="text" class="form-control reg-fields @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                                @error('user_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="row mb-3">
                                    <label for="userName" class="col-md-4 col-form-label">{{ __('Username') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="userName" type="text" class="form-control reg-fields @error('userName') is-invalid @enderror" name="userName" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                        @error('userName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}

                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="email" class="col-md-4 col-form-label ">{{ __('Email Address') }}</label>
                                            <div class="input-group">
                                                <span class="p-2 user-icon input-group-text" id="email">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </span>
                                                <input id="userEmail" type="text" class="form-control reg-fields @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
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
                                    <label for="email" class="col-md-4 col-form-label ">{{ __('Email Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="userEmail" type="text" class="form-control reg-fields @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div id="emailExists" class="row mb-3" hidden> </div>
                                <div id="emailValid" class="row mb-3" hidden> </div>
                               
                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="roles" class="col-md-4 col-form-label">{{ __('Role Name') }}</label>
                                            <div class="input-group">
                                                <select  class="select reg-fields @error('role_name') is-invalid @enderror form-control" name="role_name" id="roles" >
                                                    <option selected value="">-- Select Role Name --</option>
                                                    @foreach ($role as $name)
                                                        <option  value="{{ $name->role_type }}">{{ $name->role_type }}</option>
                                                    @endforeach
                                                </select>
                                                @error('role_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="row mb-3">
                                    <label for="roles" class="col-md-4 col-form-label">{{ __('Role Name') }}</label>
        
                                    <div class="col-md-6">
                                        <select  class="select reg-fields @error('role_name') is-invalid @enderror form-control" name="role_name" id="roles" >
                                            <option selected value="">-- Select Role Name --</option>
                                            @foreach ($role as $name)
                                                <option  value="{{ $name->role_type }}">{{ $name->role_type }}</option>
                                            @endforeach
                                        </select>
                                        @error('role_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}
        
                                {{-- <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
        
                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div> --}}
        

                                <div class="form-group text-center mb-3">
                                    <button id="regButton" type="submit" class="btn account-btn" disabled>
                                        {{ __('Register') }}
                                    </button>
                                </div>
                                
                                {{-- <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button id="regButton" type="submit" class="btn account-btn" disabled>
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection