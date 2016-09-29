<?php
/**
 * Created by PhpStorm.
 * User: caizixin
 * Date: 16/9/20
 * Time: 上午11:14
 */

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use App\OAuth\OAuthConnection;

class ReceiveImplicitTokenController extends Controller
{
	public function receiveImplicitToken()
	{
		$request = OAuthConnection::getRequest(); // the request object

		// the user denied the authorization request
		if ($request->get('error')) {
			return view('client/failed_token_request', array('response' => $request->getAllQueryParameters()));
		}

		// nothing to do - implicit tokens are in the URL Fragment, so it must be done by the browser

		return view('client/show_implicit_token');
	}
}