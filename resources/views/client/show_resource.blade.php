@extends('client/base')

@section('content')
    <h3>Resource Request Complete!</h3>
    @if (isset($response['friends']))
        <p>
            You have successfully called the APIs with your Access Token.  Here are your friends:
        </p>

        <ul>
            @foreach ($response['friends'] as $friend)
                <li>{{ $friend }}</li>
            @endforeach
        </ul>

        <p>Here is the full JSON response: </p>

        <pre>{{ json_encode($response) }}</pre>
    @else
        <h4>Response:</h4>
        @include('client/_error')
    @endif

    <pre><code>  The API call can be seen at <a href="{{ $resource_uri }}" target="_blank">{{$resource_uri}}</a></code></pre>

    <a href="{{ url('home') }}">back</a>
@endsection
