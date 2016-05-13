<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!--[if IE]>
     <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">

    {{-- Open Graph Sections --}}
    <meta property="og:type"  content="website" />
    <meta property="og:title"  content="@yield('og:title')" />
    <meta property="og:image"  content="@yield('og:image')" />
    {{-- [END] Open Graph Sections --}}

    {{-- Styles --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {!! Minify::stylesheet([

        '/asset/css/style.css',

      ]) !!}
    {{-- [END] Styles --}}
  </head>
  <body>
    @yield('content')

    {{-- Scripts --}}
    {!! Minify::javascript([

        '/asset/js/scripts.js',

      ]) !!}
    {{-- [END] Scripts --}}
  </body>
</html>
