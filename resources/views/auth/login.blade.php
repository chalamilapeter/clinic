@extends('layouts.homepage.common')
@section('title', "Login")
@section('styles')
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="row col-md-8 offset-md-2" style="margin-top: 130px; margin-bottom: 80px">
        <div class="col-lg-6 d-none d-lg-block">
            <img src="{{asset('img/login.svg')}}" width="500px"  alt="" class="p-3 mt-4">
        </div>
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
                </div>
                <form class="user" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
                               id="exampleInputEmail" aria-describedby="emailHelp"
                               placeholder="Enter Admission Number or Email Address..."  name="email" value="{{ old('email') }}">

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
                            <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customCheck">Remember
                                Me</label>
                        </div>
                    </div>
                    <button type = "submit" class="btn btn-primary btn-user btn-block">
                        Login
                    </button>
                    <hr>
                </form>
                <div class="text-center">
                    @if (Route::has('password.request'))
                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

@endsection
