<h3>Open ID Connect ID Token</h3>
<p>
    Because you requested the token using <code>scope=openid</code>, you have also received an
    ID token!
</p>

<pre><code>  ID Token: {{ $id_token }}  </code></pre>

<?php $jwt = explode('.', $id_token) ?>

<p>This token contains the following information about the user: </p>

<pre>
{{ json_encode(base64_decode($jwt[1])) }}
</pre>