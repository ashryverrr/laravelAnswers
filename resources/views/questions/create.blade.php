<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    </head>
    <body>

        <div class="container">
            <h1>Ask a question</h1>
                <form action="{{ route('questions.store') }}" method="POST">
                    {{ csrf_field() }}
                    <label for="title">Question</label>
                    <input type="text" name="title" id="title" class="form-control">
                    <label for="description">More Information</label>
                    <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>

                    <input type="submit" class="btn btn-primary" value="Submit Question">
                </form>
        </div>

    </body>
</html>
