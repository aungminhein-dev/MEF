<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>MSA - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta name="author" content="Themesberg">

   @include('admin.layout.style')
    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>
<body>
    <main>
        @yield('content')
    </main>
    @include('admin.layout.script')
</body>
</html>
