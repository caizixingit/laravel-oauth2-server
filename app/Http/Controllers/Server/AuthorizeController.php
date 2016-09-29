<?php

/**
 * Created by PhpStorm.
 * User: caizixin
 * Date: 16/9/18
 * Time: 下午4:28
 */
namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\OAuth\OAuth;
use App\OAuth\OAuthConnection;


class AuthorizeController extends Controller
{
	/**
	 * The user is directed here by the client in order to authorize the client app
	 * to access his/her data
	 */
	public function oAuthorize()
	{
		// get the oauth server (configured in src/OAuth2Demo/Server/Server.php)
		/** @var OAuthConnection $oauth */
		//$oauth = OAuthConnection::getFacadeRoot();

		$server = OAuth::getServer();

		// get the oauth response (configured in src/OAuth2Demo/Server/Server.php)
		$response = OAuth::getResponse();
		$request = OAuth::getRequest();

		// validate the authorize request.  if it is invalid, redirect back to the client with the errors in tow
		if (!$server->validateAuthorizeRequest($request, $response)) {
			return $server->getResponse();
		}

		// display the "do you want to authorize?" form
		return view('server/authorize', array(
			'client_id' => $request->query->get('client_id'),
			'response_type' => $request->query->get('response_type'),
			'query_string' => $request->getQueryString(),
			'request' => $request,
		));
	}

	/**
	 * This is called once the user decides to authorize or cancel the client app's
	 * authorization request
	 */
	public function authorizeFormSubmit()
	{
		// get the oauth server (configured in src/OAuth2Demo/Server/Server.php)
		$server = OAuth::getServer();

		// get the oauth response (configured in src/OAuth2Demo/Server/Server.php)
		$response = OAuth::getResponse();
		$request = OAuth::getRequest();

		// check the form data to see if the user authorized the request
		$authorized = (bool) $request->request->get('authorize');

		// call the oauth server and return the response
		return $server->handleAuthorizeRequest($request, $response, $authorized);
	}
}