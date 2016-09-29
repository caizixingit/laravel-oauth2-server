<?php
/**
 * Created by PhpStorm.
 * User: caizixin
 * Date: 16/9/20
 * Time: 下午5:29
 */

namespace App\OAuth;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Facade;

class OAuth extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'OAuth';
	}
}

App::bind('OAuth', function()
{
	return new OAuthConnection(config('oauth.db_config'));
});