<form class="user" action="
    @if(Request::segment(2) == 'patients')
        {{route('patients.store')}}

    @elseif(Request::segment(2) == 'doctors')
    {{route('doctors.store')}}

    @elseif(Request::segment(2) == 'lab_technicians')
    {{route('lab_technicians.store')}}

    @elseif(Request::segment(2) == 'pharmacists')
    {{route('pharmacists.store')}}

    @endif
    "method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">

        <div class="card shadow mb-4 col-md-4 offset-md-1">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Credentials</h6>
            </div>
            <div class="card-body">

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
                    <input type="password" class="form-control form-control-user @error('confirm_password') is-invalid @enderror"
                           id="exampleInputPassword" placeholder="Password"  name="confirm_password">

                    @error('confirm_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <hr>

            </div>
        </div>

            <div class="card shadow mb-4 col-md-6 ml-3">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">General information</h6>
            </div>
            <div class="card-body">

                <div class="form-group">

                    <div class="row">

                       <div class="col-md-6">
                           <label for="">First Name</label>
                           <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control form-control-user  @error('first_name') is-invalid @enderror">
                           @error('first_name')
                           <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                       </div>

                       <div class="col-md-6">
                           <label for="">Middle Name</label>
                           <input type="text" name="middle_name" value="{{old('middle_name')}}" class="form-control form-control-user  @error('middle_name') is-invalid @enderror">
                           @error('middle_name')
                           <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                       </div>
                   </div>

                    <div class="row mt-2">

                        <div class="col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control form-control-user  @error('last_name') is-invalid @enderror">
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="">Gender</label>

                            <select  name="gender" class="form-control  @error('gender') is-invalid @enderror" required>
                                <option disabled selected>Select</option>
                                <option value="Male">Male</option>
                                <option value="Male">Female</option>
                            </select>

                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-2">

                        <div class="col-md-6">
                            <label for="">Birth date</label>
                            <input type="date" name="birth_date" value="{{old('birth_date')}}" class="form-control form-control-user  @error('birth_date') is-invalid @enderror">
                            @error('birth_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="">Nationality</label>
                            <input type="text" name="nationality" value="{{old('nationality')}}" class="form-control form-control-user  @error('nationality') is-invalid @enderror">
                            @error('nationality')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row mt-2">

                        <div class="col-md-6">
                            <label for="">Phone number 1</label>
                            <input type="number" name="phone_1" value="{{old('phone_1')}}" class="form-control form-control-user  @error('phone_1') is-invalid @enderror">
                            @error('phone_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="">Phone number 2</label>
                            <input type="number" name="phone_2" value="{{old('phone_2')}}" class="form-control form-control-user  @error('phone_2') is-invalid @enderror">
                            @error('phone_2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                    </div>

                    <div class="row mt-2">

                        <div class="col-md-6">
                            <label for="">Address</label>
                            <input type="text" name="address" value="{{old('address')}}" class="form-control form-control-user  @error('address') is-invalid @enderror">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="">Profile Image</label>
                            <input type="file" name="image_path" class=" @error('image_path') is-invalid @enderror">
                            @error('image_path')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                </div>

            </div>

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detailed information</h6>
            </div>

            <div class="form-group mt-3 p-3">



