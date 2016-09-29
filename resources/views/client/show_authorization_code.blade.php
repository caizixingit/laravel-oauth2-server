@extends('client/base')

@section('content')
    <h3>Authorization Code Retrieved!</h3>
    <p>We have been given an <strong>Authorization Code</strong> from the OAuth2.0 Server:</p>
    <pre><code>  Authorization Code: {{ $code }}  </code></pre>

    <p>
        Now exchange the Authorization Code for an <strong>Access Token</strong>:
    <p>

    <a class="button" href="{{ url('client/request_token_with_authcode',
     [
        'code' => $code,
     ]). '?show_refresh_token='.$show_refresh_token }}">make a token request</a>

    <div class="help"><em>usually this is done behind the scenes, but we're going step-by-step so you don't miss anything!</em></div>

    @if ($request->get("id_token"))
        @include('client/_id_token', ['id_token' => $request->get('id_token')])
    @endif

    <a href="{{ url('home') }}">back</a>
@endsection
