@extends('client.base')

@section('content')
    <h3>OAuth2.0 Demo Application</h3>
    <p>
        Welcome to the OAuth2.0 Demo Application!  This is an application that demos some of the basic OAuth2.0 Workflows.
    </p>

    <div class="simpleTabs">
        <ul class="simpleTabsNavigation">
            <li><a href="#authcode">Authorization Code</a></li>
            <li><a href="#implicit">Implicit</a></li>
            <li><a href="#usercred">User Credentials</a></li>
            <li><a href="#refresh">Refresh Token</a></li>
            <li><a href="#openid">OpenID Connect</a></li>
        </ul>
        <div class="simpleTabsContent">@include('client/grant_types/_authorization_code')</div>
        <div class="simpleTabsContent">@include('client/grant_types/_implicit')</div>
        <div class="simpleTabsContent">@include('client/grant_types/_user_credentials')</div>
        <div class="simpleTabsContent">@include('client/grant_types/_refresh_token')</div>
        <div class="simpleTabsContent">@include('client/grant_types/_openid_connect')</div>
    </div>
@endsection
