<?php
/**
 * Created by PhpStorm.
 * User: caizixin
 * Date: 16/9/19
 * Time: 下午7:01
 */

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use App\Models\cls_curl;
use Illuminate\Http\Request;

class RequestResourceController extends Controller
{
	public function requestResource(Request $request, $token = null)
	{
		$config = config('oauth.default');    // the configuration for the current oauth implementation

		$token = $token !== null ? $token : $request->get('token');
		// determine the resource endpoint to call based on our config (do this somewhere else?)
		$apiRoute = $config['resource_route'];
		$endpoint = 0 === strpos($apiRoute, 'http') ? $apiRoute : url($apiRoute, array(), false);

		// make the resource request and decode the json response
		$url = $endpoint. '?'. http_build_query(['access_token' => $token]);
		$response = cls_curl::get($url);
		$json = json_decode($response, true);
		$json = json_decode($json, true);

		return view('client/show_resource', array('response' => $json ? $json : $response, 'resource_uri' => $url));
	}

}