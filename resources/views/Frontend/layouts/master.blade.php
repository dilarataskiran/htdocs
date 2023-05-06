<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title',"Sepette Ekmek")</title>
        @include('Frontend.layouts.partials.head')
        @yield('head')
    </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        @include('Frontend.layouts.partials.header')
        @yield('content')
      @include('Frontend.layouts.partials.footer')
    @yield('footer')
  </body>
</html>