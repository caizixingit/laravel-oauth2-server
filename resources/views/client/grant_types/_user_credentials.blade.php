<p>
    The <code>User Credentials</code> grant type is a Two-Legged approach that allows you to
    obtain an <code>Access Token</code> in exchange for a set of end-user credentials.
</p>

<p>
    The OAuth2 Server supports the following user credentials:
</p>

<ul>
    <li><strong>Username</strong>: {{ $user['user_credentials'][0] }}</li>
    <li><strong>Password</strong>: {{ $user['user_credentials'][1] }}</li>
</ul>

<p>Make the following cURL request to receive an access token:</p>

<pre><code>  <?php echo shell_exec("curl -v 'url({$user['token_route']}' -d 'grant_type=password&client_id={$user['client_id']}&client_secret={{$user['client_secret']}}&username={$user['user_credentials'][0]}&password={$user['user_credentials'][1]}' ");?>
</code></pre>

<p>...or just click below to let us do it for you<p>

<a class="button" href="{{ url('client/request_token_with_usercredentials') }}?username={{$user['user_credentials'][0]}}&password={{ $user['user_credentials'][1] }}">Get Access Token</a>
