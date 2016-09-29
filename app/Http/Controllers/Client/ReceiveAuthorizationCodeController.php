<?php

/**
 * Created by PhpStorm.
 * User: caizixin
 * Date: 16/9/19
 * Time: 下午3:21
 */
namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use App\OAuth\OAuthConnection;

class ReceiveAuthorizationCodeController extends Controller
{
	public function receiveAuthorizationCode($show_refresh_token = null)
	{
		session_start();
		$request = OAuthConnection::getRequest(); // the request object

		// the user denied the authorization request
		if (!$code = $request->get('code')) {
			return view('client/failed_authorization', array('response' => $request->getAllQueryParameters()));
		}

		// verify the "state" parameter matches this user's session (this is like CSRF - very important!!)
		if ($request->get('state') !== session_id()) {
			return view('client/failed_authorization', array('response' => array('error_description' => 'Your session has expired.  Please try again.')));
		}

		return view('client/show_authorization_code', array('code' => $code, 'request' => $request, 'show_refresh_token' => $show_refresh_token));
	}
}