@extends('layouts.auth.common')

@section('auth_content')
    <div class="row">
        <div class="col-lg-6 d-none d-lg-block">
            <img src="{{asset('img/login.svg')}}" width="500px"  alt="" class="p-3 mt-4">
        </div>
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                </div>
                <form class="user" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                               id="exampleInputEmail" aria-describedby="emailHelp"
                               placeholder="Enter Email Address..."  name="email" value="{{ old('email') }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                               id="exampleInputPassword" placeholder="Password"  name="password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror

                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Remember
                                Me</label>
                        </div>
                    </div>
                    <a href="index.html" class="btn btn-primary btn-user btn-block">
                        Login
                    </a>
                    <hr>
                </form>
                <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>
                <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                </div>
            </div>
        </div>
    </div>
@endsection
