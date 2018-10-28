@extends('layouts.appp')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1> Do you have a question?</h1>
            <p>
                Feel free to ask them and our community will answer it for you!
            </p>
            <p>
                <a href="{{ route('questions.create') }}" class="btn btn-primary btn-lg">Ask Now</a>
            </p>                        
        </div>
    </div>
    <div class="container">
        <h2>Recent Questions:</h2>
    </div>
@endsection

