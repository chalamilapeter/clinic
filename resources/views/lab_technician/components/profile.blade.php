
@section('image')

    @if(auth()->user()->lab_technician->image_path != null)
        <img class="img-profile rounded-circle" src="{{asset(auth()->user()->lab_technician->image_path)}}">
    @else
        <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
    @endif

@endsection

@section('name')

    @if(auth()->user()->lab_technician->first_name != null)
        {{auth()->user()->lab_technician->first_name . " " . auth()->user()->lab_technician->last_name }}
        <small> - {{auth()->user()->lab_technician->lab->name}}</small>
    @else
        {{auth()->user()->email}}
    @endif

@endsection
