
@section('name')

    @if(auth()->user()->patient->first_name != null)
        {{auth()->user()->patient->first_name . " " . auth()->user()->patient->last_name }}
    @else
        {{auth()->user()->email}}
    @endif

@endsection
