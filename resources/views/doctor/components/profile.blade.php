@section('name')

    @if(auth()->user()->doctor->first_name != null)
       Dr. {{auth()->user()->doctor->first_name . " " . auth()->user()->doctor->last_name }} <small> - KCMC</small>
    @else
        {{auth()->user()->email}}
    @endif

@endsection
