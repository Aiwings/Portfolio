<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{$page->description}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css" />
    <title> {{ env('APP_NAME') }}|{{ $page->title }}</title>
</head>

<body>
    <div id="app">
        <home-page></home-page>
    </div>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "abstract": "Portfolio de Guillaume ROUX, développeur fullstack",
            "author": {
                "@type": "Person",
                "givenName": "Guillaume",
                "familyName": "ROUX",
                "jobTitle":"FullStack Developper",
                "telephone": "+33628061358",
                "birthDate": "1992-08-07",
                "email": "roux.gensou@gmail.com",
                "birthPlace": {
                    "@type": "Place",
                    "address": "Montpellier, Occitanie, France"
                }
            }
        }
    </script>
    <script id="sections" type="application/json">
        {{$sections}}
    </script>
    <script src="js/manifest.js"></script>
    <script src="js/vendor.js"></script>
    <script src="js/app.js"></script>

</body>

</html>