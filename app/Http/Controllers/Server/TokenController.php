<?php
/**
 * Created by PhpStorm.
 * User: caizixin
 * Date: 16/9/19
 * Time: 下午5:52
 */

namespace App\Http\Controllers\Server;


use App\Http\Controllers\Controller;
use App\OAuth\OAuth;
use App\OAuth\OAuthConnection;

class TokenController extends Controller
{
	/**
	 * This is called by the client app once the client has obtained
	 * an authorization code from the Authorize Controller (@see OAuth2Demo\Server\Controllers\Authorize).
	 * If the request is valid, an access token will be returned
	 */
	public function token()
	{
		// get the oauth server (configured in src/OAuth2Demo/Server/Server.php)
		$server = OAuth::getServer();

		// get the oauth response (configured in src/OAuth2Demo/Server/Server.php)
		$response = OAuth::getResponse();
		$request = OAuth::getRequest();

		// let the oauth2-server-php library do all the work!
		return $server->handleTokenRequest($request, $response);
	}

}