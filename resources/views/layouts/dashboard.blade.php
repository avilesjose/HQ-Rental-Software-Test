<!doctype html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>HQ Rental Software Test</title>
        <link rel="stylesheet" href="{{asset('css/app.css?v=2')}}">
        @yield("links")
    </head>

    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{route('index')}}">HQ Rental Software Test</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @yield("options")
                </ul>
            </div>
        </nav>

        <div class="content">
            @yield("content")
        </div>
        <script type="text/javascript" src="{{asset('js/app.js?v=2')}}"></script>
        @yield("scripts")
    </body>

</html>
