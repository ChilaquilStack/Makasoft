<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/app.css">
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