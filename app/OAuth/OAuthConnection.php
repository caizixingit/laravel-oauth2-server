<?php

/**
 * Created by PhpStorm.
 * User: caizixin
 * Date: 16/9/18
 * Time: 下午4:52
 */
namespace App\OAuth;

use Illuminate\Support\Facades\App;
use OAuth2\HttpFoundationBridge\Response as BridgeResponse;
use OAuth2\Server as OAuth2Server;
use OAuth2\Storage\Pdo;
use OAuth2\Storage\Memory;
use OAuth2\OpenID\GrantType\AuthorizationCode;
use OAuth2\GrantType\UserCredentials;
use OAuth2\GrantType\RefreshToken;
use OAuth2\HttpFoundationBridge\Request;

class OAuthConnection
{
	protected $oauth_server;
	protected $oauth_response;
	public static $request;

	public function __construct($config)
	{
		if(!isset($config['dsn']))
		{
			throw new \Exception('config dsn not found');
		}
		// create PDO-based sqlite storage
		$storage = new Pdo($config);

		// create array of supported grant types
		$grantTypes = array(
			'authorization_code' => new AuthorizationCode($storage),
			'user_credentials'   => new UserCredentials($storage),
			'refresh_token'      => new RefreshToken($storage, array(
				'always_issue_new_refresh_token' => true,
			)),
		);

		// instantiate the oauth server
		$server = new OAuth2Server($storage, array(
			'enforce_state' => true,
			'allow_implicit' => true,
			'use_openid_connect' => true,
			'issuer' => $_SERVER['HTTP_HOST'],
		),$grantTypes);

		$server->addStorage($this->getKeyStorage(), 'public_key');

		// add the server to the silex "container" so we can use it in our controllers (see src/OAuth2Demo/Server/Controllers/.*)
		$this->oauth_server = $server;

		/**
		 * add HttpFoundataionBridge Response to the container, which returns a silex-compatible response object
		 * @see (https://github.com/bshaffer/oauth2-server-httpfoundation-bridge)
		 */
		$this->oauth_response = new BridgeResponse();
	}

	private function getKeyStorage()
	{
		$publicKey  = file_get_contents(app_path(). '/data/pubkey.pem');
		$privateKey = file_get_contents(app_path(). '/data/privkey.pem');

		// create storage
		$keyStorage = new Memory(array('keys' => array(
			'public_key'  => $publicKey,
			'private_key' => $privateKey,
		)));

		return $keyStorage;
	}

	/**
	 * @return OAuth2Server
	 */
	public function getServer()
	{
		return $this->oauth_server;
	}

	/**
	 * @return BridgeResponse
	 */
	public function getResponse()
	{
		return $this->oauth_response;
	}

	/**
	 * @return Request
	 */
	public static function getRequest()
	{
		if(!self::$request)
		{
			self::$request = Request::createFromGlobals();
		}

		return self::$request;
	}

}