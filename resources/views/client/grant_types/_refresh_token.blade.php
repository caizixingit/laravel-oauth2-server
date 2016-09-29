<p>
    The <code>Refresh Token</code> grant type is typically used in tandem with the <code>Authorization Code</code> grant type. Click the "Authorize" button to receive an authorization code:
</p>
<a class="button" href="{{ url($user['authorize_route']) }}?response_type=code&client_id={{$user['client_id']}}&redirect_uri={{ urlencode(url('client/receive_authcode', ['show_refresh_token'=>1])) }}&state={{$session_id}}">Authorize</a>