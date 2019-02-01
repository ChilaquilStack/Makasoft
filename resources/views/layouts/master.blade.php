<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/app.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <title>
            @yield('title','Pokedex')
        </title>
    </head>
    <body>
        @include('layouts.navbar')
        <main id="app">
            <div class="container">
                @yield('content')
            </div>
        </main>
        @include('layouts.footer')
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/app.js"></script>
    </body>
</html>