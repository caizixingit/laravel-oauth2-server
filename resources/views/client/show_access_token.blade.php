@extends('client/base')

@section('content')
    <h3>Token Retrieved!</h3>
    <pre><code>  Access Token: {{ $response['access_token'] }}  </code></pre>

    @if ($response['expires_in'])
    <div class="help"><em>Expires in {{ $response['expires_in'] }} seconds</em></div>
    @endif

    <p>
        Now use this token to make a request to the OAuth2.0 Server's APIs:
    </p>

    <a class="button" href="{{ url('client/request_resource', ['token'=> $response['access_token']]) }}">make a resource request</a>

    <div class="help"><em>This token can now be used multiple times to make API requests for this user.</em></div>

    @if (isset($response['id_token']))
        @include('client/_id_token', ['id_token'=> $response['id_token']])
    @endif

    <a href="{{ url('home') }}">back</a>
@endsection