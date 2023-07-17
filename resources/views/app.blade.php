<!doctype html>
<!-- pages's main theme -->
<html lang="en" class="">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
        <script src="/js/app.js"></script>
        <link ref="stylesheet" href="/css/app.css" rel="stylesheet">
    </head>
    <body>
        <x-header/>
        <div id="page">
            <div id="sidebar">
                <!-- sidebar menu -->
                <x-menu/>
            </div>
            <div id="content">
                <!-- page's content -->
                @yield('content')
            </div>
        </div>
        <x-footer/>
    </body>
</html>
