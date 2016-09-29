<p>
    The <code>Authorization Code</code> grant type is the most common workflow for OAuth2.0.  Clicking the "Authorize" button below will send you to an OAuth2.0 Server to authorize:
</p>
<a class="button" href="{{ url($user['authorize_route']) }}?response_type=code&client_id={{$user['client_id']}}&redirect_uri={{ urlencode(url('client/receive_authcode')) }}&state={{$session_id}}">Authorize</a>