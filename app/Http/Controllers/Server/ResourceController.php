<?php
/**
 * Created by PhpStorm.
 * User: caizixin
 * Date: 16/9/19
 * Time: 下午7:16
 */

namespace App\Http\Controllers\Server;


use App\Http\Controllers\Controller;
use App\OAuth\OAuth;
use App\OAuth\OAuthConnection;
use OAuth2\HttpFoundationBridge\Response;

class ResourceController extends Controller
{
	/**
	 * This is called by the client app once the client has obtained an access
	 * token for the current user.  If the token is valid, the resource (in this
	 * case, the "friends" of the current user) will be returned to the client
	 */
	public function resource()
	{
		// get the oauth server (configured in src/OAuth2Demo/Server/Server.php)
		$server = OAuth::getServer();

		// get the oauth response (configured in src/OAuth2Demo/Server/Server.php)
		$response = OAuth::getResponse();
		$request = OAuth::getRequest();

		if (!$server->verifyResourceRequest($request, $response)) {
			return $server->getResponse();
		} else {
			// return a fake API response - not that exciting
			// @TODO return something more valuable, like the name of the logged in user
			$api_response = array(
				'friends' => array(
					'john',
					'matt',
					'jane'
				)
			);
			return new Response(json_encode($api_response));
		}
	}
}