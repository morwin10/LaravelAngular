<!DOCTYPE html>
<html>
  <head>
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0-rc2/css/bootstrap.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.2.0/respond.js"></script>
    <![endif]-->
<meta name="NetsparkQuiltingResult" total-length="2319" removed="0" rules-found="w2787,w7565,w7597,w2132" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
<script> var BASE_URL = '{{ url() }}/'; </script>
<style>
      ul {
          white-space: nowrap;
          overflow:hidden;
      }
</style>

</head>
  <body>
    <div class="container">
    <ul class="nav nav-tabs nav-justified">
    @if($main_menu)

    
    @foreach($main_menu as $menu)
    
    <li class=""><a href="{{ url($menu['url']) }}">{{$menu['link']}}</a></li>
    @endforeach

    @endif
    <li class="">
        <a href="{{url('store')}}">Store</a>
    </li>
    </ul>
    @yield('content')
    
    </div><!-- end of container -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0-rc2/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="{{ asset('assets/js/myAngular.js') }}"></script>
  </body>
</html>