@extends('client/base')
@section('content')
    <h3>Token Retrieved!</h3>

    <p>
        But let's pretend this access token has expired. Luckily, it came with a refresh token!
    </p>

    <pre><code>  Refresh Token: {{ $response['refresh_token'] }}  </code></pre>

    <a class="button" href="{{ url('client/request_token_with_refresh_token', ['refresh_token'=> $response['refresh_token']]) }}">renew your access token</a>

    <div class="help"><em>The refresh token can be used to get a new access token after the access token has expired.</em></div>

    <a href="{{ url('home') }}">back</a>
@endsection
