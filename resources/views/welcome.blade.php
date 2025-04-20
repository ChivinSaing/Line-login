<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    </head>
    <body class="d-flex justify-content-center align-items-center text-light bg-dark" style="height: 100vh">
        <div>
            <h1>
                Welcome to our web application
            </h1>
            <div class="d-flex justify-content-center">

                <a href="/login/line" class="btn btn-light">-> Go to dashboard</a>
            </div>
        </div>
    </body>
</html>
