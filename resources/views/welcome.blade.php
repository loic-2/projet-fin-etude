<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
        <link rel="stylesheet" href="https://shrouded-brushlands-38845.herokuapp.com/css/app.css">
        <title>Laravel</title>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                overflow-x: hidden;
            }
        </style>
    </head>
    <body class="antialiased">
        <div id=app>
            <app></app>   
        </div>
        <script src={{{ mix('js/app.js') }}}></script>
        </body>
</html>
