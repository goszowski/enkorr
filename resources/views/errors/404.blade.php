<!DOCTYPE html>
<html>
    <head>
        <title>404 Page not found</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">
        <link href="{{asset('admin/admin-lte/AdminLTE.css')}}" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #838a8e;
                display: table;
                font-weight: 300;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">404</div>
                <p>
                  <b>{{__('Page not found')}}</b>
                </p>
                <p>
                  <a href="{{asset('/')}}">Go to Home</a>
                </p>
            </div>
        </div>
    </body>
</html>
