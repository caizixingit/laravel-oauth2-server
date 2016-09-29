<?php
/**
 * Created by PhpStorm.
 * User: caizixin
 * Date: 16/9/18
 * Time: 下午3:52
 */

return [
	'default' => [
		"client_id" => "oauth_test_client",
		"client_secret" => "testpass",
		"token_route" => "server/grant",
		"authorize_route" => "server/authorize",
		"resource_route" => "server/access",
		"resource_params" => [],
		"user_credentials" => ["testuser", "password"],
	],

	'db_config' => [
		'dsn' => 'mysql:host=localhost;port=3306;dbname=oauth2_server_php',
		'username' => 'root',
		'password' => 'MhxzKhl',
	]
];