<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
       @include('nav.nav')
       <div class="jumbotron text-center">
            <h1>Training assignment for a PHP developer</h1>
            
          </div>
          <div class="container">
          @guest
          @else
              <button type="button" class="btn btn-default" onclick="window.location='{{ url("/home/create") }}'">+Create new ad</button>

          @endguest
          </div>
       <div class="container" id="con">
           
            
                <br></br>
                <div class="starter-template">
                    @include('Messages.message')
                        @yield('content')
                </div>
              </div><!-- /.container -->
              <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
   
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>
     @yield('script')  
    
</body>
</html>
