<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
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
                display: flex;
                flex-direction: column;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            td {
                border: 1px solid black;
                font-size: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            

            <div class="content">
                <div class="title m-b-md">
                    Numbers Evaluation
                </div>
                <table>
                    @foreach ($response as $item)
                        @switch($item)
                            @case('Linio')
                                <tr><td style="background-color:yellow">{{ $item }}</td></tr>
                                @break
                            @case('IT')
                                <tr><td style="background-color:blue">{{ $item }}</td></tr>
                                @break
                            @case('Linianos')
                                <tr><td style="background-color:red">{{ $item }}</td></tr>
                                @break
                            @default
                                <tr><td style="background-color:white">{{ $item }}</td></tr>
                        @endswitch
                    @endforeach
                </table>
            </div>
        </div>
    </body>
</html>
