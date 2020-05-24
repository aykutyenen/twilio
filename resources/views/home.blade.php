<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Twilio</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <br>
        <a class="btn btn-primary" href="/room">Open New Room</a>
        <a class="btn btn-danger" href="/room/getAccessToken">Get Access Token</a>
        <a class="btn btn-success" href="/room/connect">Connect to room</a>
        <a class="btn btn-dark" href="/room/complete">Complete a room</a>
    </div>

    </body>
</html>
