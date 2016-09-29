#!/bin/sh
mv .//client/_environment.twig .//client/_environment.blade.php
mv .//client/_error.twig .//client/_error.blade.php
mv .//client/_id_token.twig .//client/_id_token.blade.php
mv .//client/base.twig .//client/base.blade.php
mv .//client/failed_authorization.twig .//client/failed_authorization.blade.php
mv .//client/failed_token_request.twig .//client/failed_token_request.blade.php
mv .//client/grant_types/_authorization_code.twig .//client/grant_types/_authorization_code.blade.php
mv .//client/grant_types/_implicit.twig .//client/grant_types/_implicit.blade.php
mv .//client/grant_types/_openid_connect.twig .//client/grant_types/_openid_connect.blade.php
mv .//client/grant_types/_refresh_token.twig .//client/grant_types/_refresh_token.blade.php
mv .//client/grant_types/_user_credentials.twig .//client/grant_types/_user_credentials.blade.php
mv .//client/index.twig .//client/index.blade.php
mv .//client/show_access_token.twig .//client/show_access_token.blade.php
mv .//client/show_authorization_code.twig .//client/show_authorization_code.blade.php
mv .//client/show_implicit_token.twig .//client/show_implicit_token.blade.php
mv .//client/show_refresh_token.twig .//client/show_refresh_token.blade.php
mv .//client/show_resource.twig .//client/show_resource.blade.php
mv .//server/authorize.twig .//server/authorize.blade.php
mv .//server/base.twig .//server/base.blade.php
mv .//shared/_analytics.twig .//shared/_analytics.blade.php
mv .//shared/_github.twig .//shared/_github.blade.php