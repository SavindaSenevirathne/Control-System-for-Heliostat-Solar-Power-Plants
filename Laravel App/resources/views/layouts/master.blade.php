<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/img/icon.ico">
        <title>Control System for Heliostat Solar Power Plants</title>

        <!-- Bootstrap core CSS -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        @yield ('styles')

    </head>
    <body>
        @include ('layouts.nav')
        @yield ('header')
        <div class="container-fluid">
            <div class="row">
                @include ('layouts.sidebar')
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                    @yield ('content')
                </main>
            </div>
        </div>
        @yield ('footer')

        <!-- Bootstrap core JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
          feather.replace()
        </script>

    </body>
</html>