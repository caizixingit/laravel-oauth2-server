@extends('server/base')
@section('content')
    <h3>
        Welcome to the OAuth2.0 Server!
    </h3>
    <p>
        You have been sent here by <strong>{{$client_id}}</strong>.  {{$client_id}} would like to access the following data:
    </p>
    <ul>
        <li>friends</li>
        <li>memories</li>
        <li>hopes, dreams, passions, etc.</li>
        <li>sock drawer</li>
    </ul>
    <p>It will use this data to:</p>
    <ul>
        <li>integrate with friends</li>
        <li>make your life better</li>
        <li>miscellaneous nefarious purposes</li>
    </ul>
    <p>Click the button below to complete the authorize request and grant an <code>{{ $response_type == 'code' ? 'Authorization Code' : 'Access Token' }}</code> to {{$client_id}}.
    <ul class="authorize_options">
        <li>
            <form action="{{ url('server/authorize') . '?' . $query_string }}" method="post">
                {!! csrf_field()  !!}
                <input type="submit" class="button authorize" value="Yes, I Authorize This Request" />
                <input type="hidden" name="authorize" value="1" />
            </form>
        </li>
        <li class="cancel">
            <form id="cancel" action="{{ url('server/authorize'). '?'. $query_string }}" method="post">
                {!! csrf_field()  !!}
                <a href="#" onclick="document.getElementById('cancel').submit()">cancel</a>
                <input type="hidden" name="authorize" value="0" />
            </form>
        </li>
    </ul>
@endsection