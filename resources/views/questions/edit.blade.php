@extends('layouts.appp')

@section('content')

    <body>

        <div class="container">
            <h1>Edit your question</h1>
                <form action="{{ route('questions.update', $question->id) }}" method="POST">
                    {{ method_field('PUT')}}   
                    {{ csrf_field() }}
                    <label for="title">Question</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $question->title }}">
                    <label for="description">More Information</label>
                    <textarea name="description" id="description" cols="30" rows="4" class="form-control">{{ $question->description }}</textarea>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Update Question">
                </form>
        </div>

@endsection