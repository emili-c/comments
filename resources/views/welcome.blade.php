<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Comments</title>
        <style type="text/css">
            body
            {
              display: flex;
              justify-content: center;
              align-items: center;
              height: 100vh;
              margin: 0;
            }
            a
            {
                text-decoration: none;
            }
        </style>
    </head>
    <body>
         <a href="{{ url('/admin/login') }}">Admin Login</a>&nbsp;&nbsp;
         <a href="{{ url('/customer/login') }}">Customer Login</a>
    </body>
</html>
