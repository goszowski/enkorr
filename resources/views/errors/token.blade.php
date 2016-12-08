<!DOCTYPE html>
<html>
    <head>
        <title>Token Error</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                font-size: 62px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">{{__('SECURITY ERROR')}}</div>
                <p>
                  <b>{{__('This request is suspicious and so we declined')}}</b>
                </p>
                <p>
                  {{__('Please, try again')}}
                </p>
            </div>
        </div>
    </body>
</html>
