<html>
  <head>
    <title>Admin Panel</title>
        
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/bootstrap/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/cms_style.css') }}">
    
    </head>
    <body>
        
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <h2 class="text-center">Watchme - Admin Panel</h2>
          </div>
          
          <div class="row">
            <div class="col-xs-12 col-md-12">
              <div class="col-xs-3 col-md-2">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="{{ url('cms/dashboard') }}">Dashboard</a></li>
                  <li><a href="{{ url('cms/categories') }}">Categories</a></li>
                  <li><a href="{{ url('cms/products') }}">Products</a></li>
                  <li><a href="{{ url('cms/menu') }}">Menu</a></li>
                  <li><a href="{{ url('cms/content') }}">Content</a></li>
                  <li><a href="{{ url('cms/orders') }}">Orders</a></li>
                  <li><a href="{{ url('user/logout') }}">Logout</a></li>
                  <li><a href="{{ url('') }}">Back to site</a></li>
                </ul>
              </div>
                
              <div class="col-xs-10">
                  
                @if($errors->any()) @include('includes.eroors') @endif

                @if(Session::has('sm')) @include('includes.sm') @endif

                @if(Session::has('em')) @include('includes.em') @endif
                
              </div>

                
              <div class="col-xs-7 col-md-10">@yield('cms_content')</div>
            </div>  
          </div>
      </div>
    </div>
        

        
        
        
        
    <div class="footer">
        <div class="col-md-12"><p class="text-center">Watchme {{ date('Y') }} &copy;</p></div>
    </div>
        
    <script type="text/javascript" src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/lib/bootstrap/js/bootstrap.min.js') }}"></script>  
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>				
    </body>
</html>
