<!DOCTYPE html>
<html lang="en">
  <head>
    @include('frontend.includes.header')
    <title>The Editorail Post</title>
    @include('frontend.includes.css')
  </head>

  <body>
    @yield('body-content')
    @include('frontend.includes.footer')
    @include('frontend.includes.script')
    @yield('js-codes')
  </body>
</html>