<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css" />
    <title> {{ env('APP_NAME') }}</title>
</head>

<body>
    <div id="app">
        <home></home>
    </div>
    <script src="js/manifest.js"></script>
    <script src="js/vendor.js"></script>
    <script src="js/app.js"></script>

</body>

</html>