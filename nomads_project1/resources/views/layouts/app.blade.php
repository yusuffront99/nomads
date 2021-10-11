<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200&family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('frontend/libraries/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('frontend/styles/main.css')}}">
    @include('includes.style')
    @stack('addon-style')
</head>
<body>

    <!-- Navbar -->
    @include('includes.navbar')

    @yield('container')

    <!-- Footer -->
    @include('includes.footer')
    @include('includes.script')
    @stack('addon-script')
</body>
</html> 