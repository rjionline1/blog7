<!DOCTYPE html>
<html lang="en">

  <head>

    @include('partials._head')

  </head>

  <body>

    @include('partials._nav')

    @include('partials._messages')
        
    <div class="container">

    <i><small>{{ Auth::check() ? "Logged In" : "Logged Out"}}</small></i>

    @yield('content')

    @include('partials._footer')

    </div>
    <!--end of container-->

    @include('partials._javascript')

  </body>

</html>