<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title',"Stok Takip")</title>
  @include('Backend.layouts.partials.head')
  @yield('head')
</head>
<body class="hold-transition skin-blue sidebar-mini">

  @include('Backend.layouts.partials.header')
  @include('Backend.layouts.partials.sidebar')

  @yield('content')

  @include('Backend.layouts.partials.footer')
  @yield('footer')
</body>
</html>
