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
            <div class="row">
                <br>
                <div class="col-md-3">
                    <h3>Local</h3>
                    <div class="col-md-12" id="local-media" data-token="{{ $token }}" data-name="{{ $name }}"></div>
                </div>
                <div class="col-md-9">
                    <h3>Remote</h3>
                    <div class="col-md-12" id="remote-media"></div>
                </div>
            </div>
        </div>
  
    <script src="{{ asset('js/join.js')}}"></script>

    </body>
</html>
