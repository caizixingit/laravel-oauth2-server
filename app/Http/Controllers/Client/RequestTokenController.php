<?php
/**
 * Created by PhpStorm.
 * User: caizixin
 * Date: 16/9/19
 * Time: 下午4:14
 */

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use App\Models\cls_curl;
use App\OAuth\OAuthConnection;

class RequestTokenController extends Controller
{
	public function requestTokenWithAuthCode($code)
	{
		$config = config('oauth.default');   // the configuration for the current oauth implementation

		$request = OAuthConnection::getRequest();
		//$code = $request->get('code');

		$redirect_uri_params = array_filter(array(
			'show_refresh_token' => $request->get('show_refresh_token'),
		));

		// exchange authorization code for access token
		$query = array(
			'grant_type'    => 'authorization_code',
			'code'          => $code,
			'client_id'     => $config['client_id'],
			'client_secret' => $config['client_secret'],
			'redirect_uri'  => url('client/receive_authcode', $redirect_uri_params, false),
		);

		// determine the token endpoint to call based on our config
		$endpoint = $config['token_route'];
		if (0 !== strpos($endpoint, 'http')) {
			// if PHP's built in web server is being used, we cannot continue
			$this->testForBuiltInWebServer();

			// generate the route
			$endpoint = url($endpoint, array(), false);
		}

		// make the token request via http and decode the json response
		$response = cls_curl::post($endpoint, $query);
		$json = json_decode($response, true);

		// if it is succesful, display the token in our app
		if (isset($json['access_token'])) {
			if ($request->get('show_refresh_token')) {
				return view('client/show_refresh_token', array('response' => $json));
			}

			return view('client/show_access_token', array('response' => $json));
		}

		return view('client/failed_token_request', array('response' => $json ? $json : $response));
	}

	public function requestTokenWithUserCredentials()
	{
		$config = config('oauth.default');    // the configuration for the current oauth implementation

		$request = OAuthConnection::getRequest();
		$username = $request->get('username');
		$password = $request->get('password');

		// exchange user credentials for access token
		$query = array(
			'grant_type'    => 'password',
			'client_id'     => $config['client_id'],
			'client_secret' => $config['client_secret'],
			'username'      => $username,
			'password'      => $password,
		);

		// determine the token endpoint to call based on our config
		$endpoint = $config['token_route'];
		if (0 !== strpos($endpoint, 'http')) {
			// if PHP's built in web server is being used, we cannot continue
			$this->testForBuiltInWebServer();

			// generate the route
			$endpoint = url($endpoint, array(), false);
		}

		// make the token request via http and decode the json response
		$response = cls_curl::post($endpoint, $query);
		$json = json_decode($response, true);

		// if it is succesful, display the token in our app
		if (isset($json['access_token'])) {
			return view('client/show_access_token', array('response' => $json));
		}

		return view('client/failed_token_request', array('response' => $json ? $json : $response));
	}

	public function requestTokenWithRefreshToken($refresh_token)
	{
		$config = config('oauth.default');    // the configuration for the current oauth implementation

		// exchange user credentials for access token
		$query = array(
			'grant_type'    => 'refresh_token',
			'client_id'     => $config['client_id'],
			'client_secret' => $config['client_secret'],
			'refresh_token' => $refresh_token,
		);

		// determine the token endpoint to call based on our config (do this somewhere else?)
		$grantRoute = $config['token_route'];
		$endpoint = 0 === strpos($grantRoute, 'http') ? $grantRoute : url($grantRoute, array(), false);

		// make the token request via http and decode the json response
		$response = cls_curl::post($endpoint,$query);
		$json = json_decode($response, true);

		// if it is succesful, display the token in our app
		if (isset($json['access_token'])) {
			return view('client/show_access_token', array('response' => $json));
		}

		return view('client/failed_token_request', array('response' => $json ? $json : $response));
	}

	public function testForBuiltInWebServer()
	{
		if (php_sapi_name() == 'cli-server') {
			$message = 'As PHP\'s built-in web-server does not allow for concurrent requests, this will result in deadlock.';
			$message .= "<br /><br />";
			$message .= 'You must configure a virtualhost via Apache or another web server to continue.  Sorry!';
			exit($message);
		}
	}
}