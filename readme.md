Laravel php-oauth2-server
=================
前一段时间做了pc上的OAuth2 Client, 主要是参照使用微信、微博、qq提供的SDK和文档对接第三方。<br />
偶然在github上看到了使用php实现的OAuth2 Server(https://github.com/bshaffer/oauth2-server-php), 自然要研究一番。<br />
秉持着实践为主的研究策略，找到了基于该server的一个demo(https://github.com/bshaffer/oauth2-demo-php), 该demo使用的是silex框架。直接部署好环境，运行，没有问题~~<br />
但是，该demo使用的数据库链接方式是sqlite。。加上最近看了一段时间laravel框架，因此有动手将该demo改成laravel框架加上mysql的版本

前端实在不是我所擅长的，因此很无耻的保留了原有demo上的所有样式~<br />

================
##注意事项
使用的mysql，因此需要初始化mysql数据库表，初始化在oauth2-server-php上有提供方法，大家可以自行研究 <br />
使用过程中，注意oauth_clients表中使用的client的grant_types要给上足够的权限，否则很多操作没法使用 <br />


======================
##参考内容
[oauth2-server-php](https://github.com/bshaffer/oauth2-server-php) <br />
[oauth2-demo-php](https://github.com/bshaffer/oauth2-demo-php)
