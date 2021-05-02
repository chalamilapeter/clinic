<div class="row">
    <div class="card shadow mb-4 col-md-4 offset-md-1">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Credentials</h6>
        </div>
        <div class="card-body">
            <form class="user" action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address:</label>
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
                    <label for="email">Password:</label>
                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                           id="exampleInputPassword" placeholder="Password"  name="password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="email">Confirm Password:</label>
                    <input type="password" class="form-control form-control-user @error('password_confirm') is-invalid @enderror"
                           id="exampleInputPassword" placeholder="Password"  name="password_confirm">

                    @error('password_confirm')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <hr>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4 col-md-6 ml-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detailed information</h6>
        </div>
        <div class="card-body">
            <form action="{{route('complaints.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="message">Describe how you feel since your last appointment</label>
                    <textarea class="form-control @error('message') is-invalid @enderror"
                              name="message" value="{{ old('message') }}" rows="7">
                        </textarea>

                    @error('message')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button class="btn btn-primary">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
