<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Resort Reservation</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
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
                color: #ececec;
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


            .flex-center.position-ref.full-height {
                background-image: url(/images/welcome-cover.jpg);
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
            }

            .welcome-cover {
                background-color: rgba(255,255,255,0.5);
            }

            .sub-title {
                font-size: 24px;
                color: #dedede;
            }

            .title.m-b-md {
                font-weight: bold;
                color: white;
            }
        </style>
    </head>
    <body>
       <div class="welcome-cover">
            <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/nuatthaihome') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                            <a href="{{ route('register') }}">Register</a>
                        @endauth
                    </div>
                @endif
                <div class="content">
                    <div class="title m-b-md">
                            Resort Reservation
                       </div>
                       <div class="sub-title">
                       <hr>
                      
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
