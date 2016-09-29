<p>
    <strong>OpenID Connect</strong> is a special way of obtaining information about a user. Click the button below to go through the OpenID connect flow. It is initiated with an authorize request (just like in <code>Authorization Code</code>) but with the <code>scope</code> querystring parameter including the value <code>"openid"</code>.
</p>


<p>
    <a class="button" href="{{ url($user['authorize_route']) }}?response_type=code&client_id={{$user['client_id']}}&redirect_uri={{ urlencode(url('client/receive_authcode')) }}&scope=openid&state={{$session_id}}&nonce={{str_random()}}">Authorization Code</a>
    <div class="help">
        Uses the Authorization Code Grant and adds the "openid" scope parameter. An ID Token comes back with the Access Token
    </div>
</p>

<p>
    <a class="button" href="{{ url($user['authorize_route']) }}?response_type=code%20id_token&client_id={{$user['client_id']}}&redirect_uri={{ urlencode(url('client/receive_authcode')) }}&scope=openid&state={{$session_id}}&nonce={{str_random()}}">Authorization Code + ID Token</a>
    <div class="help">
        Same as above, but with the "code id_token" response type. The ID Token comes back with the Authorization Code.
    </div>
</p>

<p>
    <a class="button" href="{{ url($user['authorize_route'])}}?response_type=token%20id_token&client_id={{$user['client_id']}}&redirect_uri={{urlencode(url('client/authorize_redirect_implicit')) }}&scope=openid&state={{$session_id}}&nonce={{str_random()}}">Implicit</a>
    <div class="help">
        Same as above, but with the "token id_token" response type. Similar to the <code>implicit</code> grant type, but the Access Token also returns with an ID Token.
    </div>
</p>