<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Link Innova Properties</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="./images/logo.png">

    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    {{-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> --}}
    {{-- <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet"> --}}

</head>

<body>
    <div id="app"></div>



    <script src="{{ asset(mix('js/app.js')) }}"></script>
    <script src="https://kit.fontawesome.com/a19fde44b7.js" crossorigin="anonymous"></script>
    <script
        src="https://polyfill.io/v3/polyfill.min.js?features=IntersectionObserver,ResizeObserver,WebAnimations,Object.fromEntries,Array.prototype.at">
    </script>
</body>

</html>
