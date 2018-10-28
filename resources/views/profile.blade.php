@extends('layouts.appp')

@section('content')
    <div class="container">
        <h1>{{ $user->name }}'s Profile </h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <h3> Questions </h3>
            @foreach ($user-> questions as $question)
                <div class="card border-primary mb-3">
                    <div class="card-header"> {{$question -> title }}</div>
                    <div class="card-body"> {{$question -> description}}</div>
                    <div class="card-footer"> <a href="{{ route('questions.show', $question->id) }}"> View Question </a> </div>
                </div>

            @endforeach
        </div>

        <div class="col-md-6">
            <h3>Answers</h3>
            @foreach ($user-> answers as $answer)
                <div class="card border-primary mb-3">
                    <div class="card-header"> {{$answer -> question ->title }}</div>
                    <div class="card-body"> {{$answer -> content }}</div>
                    <div class="card-footer"> <a href="{{ route('questions.show', $answer-> question->id) }}"> View all answers for this question </a> </div>
                </div>

            @endforeach
        </div>
    </div>

@endsection