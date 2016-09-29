<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <script type="text/javascript" src="/js/simpletabs_1.3.packed.js"></script>

        <link rel="stylesheet" href="/css/demo.css">
        <link rel="stylesheet" href="/css/shared.css">
        <link rel="stylesheet" href="/css/simpletabs.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        {{--@include('shared._analytics')--}}
        {{--@include('shared._github')--}}

        <div id="container">
            <header role="banner">
              @section('header')
              <hgroup>
                  <h1>Demo App</h1>
                  <h2>Demo a Better You</h2>
                      {% if app.environments %}
                        {% include 'client/_environment.twig' %}
                      {% endif %}
              </hgroup>
              <nav class="primary">
                  <ul class="menu">
                      <li class="current">
                          <a href="{{ url('/home') }}">Home</a>
                      </li>
                      <li>
                          <a href="http://brentertainment.com">Blog</a>
                      </li>
                      <li>
                          <a href="http://morehazards.com">Music</a>
                      </li>
                      <li>
                          <a href="http://github.com/bshaffer">Github</a>
                      </li>
                      <li>
                          <a href="http://twitter.com/bshaffer">Twitter</a>
                      </li>
                  </ul>
              </nav>
              @endsection
            </header>

            <article class="home" role="main">
                <div  role="main">
                  @section('content')
                      @show
                </div>
            </article>
        </div>
    </body>
</html>
