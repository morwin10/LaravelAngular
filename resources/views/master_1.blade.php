<!DOCTYPE html>
<html ng-app="app">
  <head>

    <base href="{!!  url('') !!}/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="NetsparkQuiltingResult" total-length="2319" removed="0" rules-found="w2787,w7565,w7597,w2132"   

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <!-- Angular Material requires Angular.js Libraries -->
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-animate.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-aria.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-messages.min.js"></script>

<!-- Angular Material Javascript  --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-material/1.0.6/angular-material.min.js"></script>
<!-- Angular Material css  -->
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.0.5/angular-material.min.css">

<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-cookies.min.js"></script> 


<!-- Angular ui-router -->
<script src="http://angular-ui.github.io/ui-router/release/angular-ui-router.min.js"></script>
<!-- Support SVG file - convert '.svg' to '.png' -->


<!-- <script src="{{ asset('no_conection/angular.min.js') }}"></script> <script src="{{ asset('no_conection/angular-animate.min.js') }}"></script>  <script src="{{ asset('no_conection/angular-aria.min.js') }}"></script>  <script src="{{ asset('no_conection/angular-messages.min.js') }}"></script>  <script src="{{ asset('no_conection/angular-material.min.js') }}"></script> <script src="{{ asset('no_conection/angular-cookies.min.js') }}"></script> <script src="{{ asset('no_conection/angular-ui-router.min.js') }}"></script>  <link rel="stylesheet" href="{{ asset('no_conection/angular-material.min.css') }}"> -->


<script src="{{ asset('assets/js/plagins/modernizr-custom.js') }}"></script> 

<!-- My Angular script -->
<script src="{{ asset('assets/js/app.js') }}"></script>
<!-- <script src="{{ asset('assets/js/ct-ui-router-extras.min.js') }}"></script>  'ct.ui.router.extras', 
 --><script src="{{ asset('assets/js/ngCart.js') }}"></script>
    
<!-- My stylesheet -->
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/store-item.css') }}">




  <!-- Material Design Lite -->
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.min.js"></script>
   <link rel="stylesheet" 
    href="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.red-purple.min.css" /> 
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<?php

  $path = base_path('resources\views\includes\angular-templates\\');
  $templates = File::allFiles($path);

?>

@foreach ($templates as $template)

    <script type="text/ng-template" id="{!! $template->getBasename() !!}">
      {!! file_get_contents( $path . $template->getBasename() ) !!}
    </script>

@endforeach


    <script type="text/ng-template" id="defult-icons">
      {!! file_get_contents(asset('assets/img/defult_icons.svg')); !!}
    </script>
    

    <script>

      /* global variables filling in the initial loading */

      
      // Set the main menu page
      var MENUS = {!! $main_menu !!};
      
      // Set content page of initial loading page
      var CONTENT = {!! $contentPage !!};

      // Set server token for forms, with its expiration time
      var TOKEN = {conected: '' , data: '{!! csrf_token() !!}' , exp: Date.now() + 7200000};

      var CONECT = '';

      // Base url
      var BASE_URL = document.getElementsByTagName('base')[0].href;


    </script>

<title>Laravel</title>
</head>
  <body> 
    <div>

    @include('includes.wrap-page')

    </div>


  </body>
</html>
