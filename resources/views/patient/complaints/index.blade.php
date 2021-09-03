@extends('layouts.common')

@section('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
@endsection

@section('page-title')
    Complaints - Patient
@endsection

@include('patient.components.profile')



@section('content')
    <h4 class="font-weight-bold text-center">Complaints</h4>
    <hr>
    <div class="row">

        <div class="card shadow mb-4 col-md-4 offset-md-1">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-center">Appointment Info</h6>
            </div>
            <div class="card-body">
                <h6 class="font-weight-bold">Previous Appointment:</h6>
                <hr>
                <ul>
                    <li class="my-2">Date: <span class="text-primary">{{date('d F Y'), strtotime($previous_date)}}</span></li>
                    <li  class="my-2">Doctor: <span class="text-primary">{{'Dr. '. $doctor .'. MD'}}</span></li>
                    <li  class="my-2">Overall condition: <span class="text-success">Great</span></li>
                    <li  class="my-2">Detailed results: <a href="#" >View</a></li>
                </ul>
                <hr>
                <h6 class="font-weight-bold">Next Appointment:</h6>
                <hr>
                <ul>
                    <li class="my-2">Scheduled Date: <span class="text-primary">{{$next_date->format('d F Y')}}</span></li>
                    <li  class="my-2">Doctor: <span class="text-primary">{{'Dr. '. $doctor .'. MD'}}</span></li>
                </ul>
                <hr>
            </div>
        </div>

        <div class="card shadow mb-4 col-md-6 ml-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Complaints Log</h6>
            </div>
            <div class="card-body">
                @if (date('d') === date('d', strtotime(auth()->user()->patient->appointment_date)))
                   <div class="text-center text-info">
                       <i class="far fa-sad-tear fa-9x"></i>
                   </div>
                    <h4 class="text-center mt-3">Sorry, your appointment date is not due. You cannot submit your complaint log today.</h4>
                    <hr>
                    <div class="counter text-center">
                        <h5 class="font-weight-bold">Time till next appointment:</h5>
                        <p id="demo" class="btn btn-success"></p>
                    </div>
                    <hr>
                    <p>For any problem, click to call: <a href="tel:+255786065529" class="font-weight-bold text-primary">07860 65529</a></p>
                @else
                    <div class="bg-success mb-3 p-3 text-white rounded">
                        <small>Hi, Today is your appointment day. You can submit your complaint log for diagnosis. This appointment will end in: <b class="bg-secondary py-1 px-2 mx-1 rounded" id="today"></b> and you won't be able to submit your complaints.</small>
                    </div>
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
                @endif
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("{{$next_date->format('M d, Y H:i:s')}}").getTime();
        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }

        }, 1000);
    </script>
    <script>
        // Set the date we're counting down to
        var todayCountDownDate = new Date("{{today()->addDay()->format('M d, Y H:i:s')}}").getTime();
        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var today_distance = todayCountDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var today_days = Math.floor(today_distance / (1000 * 60 * 60 * 24));
            var today_hours = Math.floor((today_distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var today_minutes = Math.floor((today_distance % (1000 * 60 * 60)) / (1000 * 60));
            var today_seconds = Math.floor((today_distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("today").innerHTML = today_days + "d " + today_hours + "h "
                + today_minutes + "m " + today_seconds + "s ";

            // If the count down is finished, write some text
            if (today_distance < 0) {
                clearInterval(x);
                document.getElementById("today").innerHTML = "EXPIRED";
            }

        }, 1000);
    </script>

@endsection
