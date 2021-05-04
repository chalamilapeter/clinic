@section('name')

    @if(auth()->user()->doctor->first_name != null)
       Dr. {{auth()->user()->doctor->first_name . " " . auth()->user()->doctor->last_name }} <small> - KCMC</small>
    @else
        {{auth()->user()->email}}
    @endif

@endsection

@section('image')

    @if(auth()->user()->doctor->image_path != null)
        <img class="img-profile rounded-circle" src="{{asset(auth()->user()->doctor->image_path)}}">
    @else
        <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
    @endif

@endsection

