
@section('image')

    @if(auth()->user()->patient->image_path != null)
        <img class="img-profile rounded-circle" src="{{asset(auth()->user()->patient->image_path)}}">
    @else
        <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
    @endif

@endsection

@section('name')

    @if(auth()->user()->patient->first_name != null)
        {{auth()->user()->patient->first_name . " " . auth()->user()->patient->last_name }}
    @else
        {{auth()->user()->email}}
    @endif

@endsection
