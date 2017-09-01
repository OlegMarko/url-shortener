<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,600" rel="stylesheet" type="text/css">

        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 300;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 70vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <h1>Short a URL.</h1>
                <span>
                    <a href="{{ $url or '' }}">{{ $url or '' }}</a>
                </span>
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                @endif
                
                @if (session('error'))
                    <p class="alert alert-danger">{{ session('error') }}</p>
                @endif
 
                @if (session('url'))
                    Short a URL: <a href="{{ asset(session('url')) }}" class="btn btn-link">{{ asset(session('url')) }}</a>
                @endif

                <form action="{{ url('/short-url/make') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="url" name="url" class="form-control input-sm" placeholder="Enter a URL.">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-default" name="Shorten">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
