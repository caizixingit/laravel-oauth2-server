<p>
    The <code>Implicit</code> grant type is very similar to the <code>Authorization Code</code> grant type,
    except that the <code>Access Token</code> is returned as part of the URL fragment instead of an API
    request to the OAuth2.0 Server. Clicking the "Authorize" button below will send you to an
    OAuth2.0 Server to authorize:
</p>
<a class="button" href="{{ $user['authorize_route'] }}?response_type=token&client_id={{$user['client_id']}}&redirect_uri={{ urlencode(url('client/authorize_redirect_implicit')) }}&state={{$session_id}}">Authorize</a>