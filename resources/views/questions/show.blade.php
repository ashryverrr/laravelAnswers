@extends('layouts.appp')

@section('content')

    <div class="container">
        @include('_includes/message/success')

        <h1>{{ $question->title }}</h1> 
        <p class="lead"> {{ $question->description }}</p>        
        <p class="pull-right">Submitted by: {{ $question->user->name }} on {{$question->created_at->diffForHumans() }} </p>
        
        @if ($question->user->id == Auth::id())
        <a href="{{ route('questions.edit', $question->id) }}">Edit Question</a>
        @endif
        <hr/>
        @if($question->answers->count() > 0)
            @foreach ($question->answers as $answer )
                <div class="card">
                    <div class="card-body">
                        <p> {{ $answer->content }} </p>
                    </div>
                    <div class="card-footer">
                        Answered by: {{ $answer->user->name }} on {{$answer->created_at->diffForHumans()}} | <a href="">Edit Answer</a> 
                    </div>
                </div>
            @endforeach        
        @else
            <h3> No answers to display. </h3>
        @endif
        <hr/>

        <form action="{{ route('answers.store') }}" method="POST">
            {{ csrf_field() }}
            <h4>Submit Your Own Answer: </h4>
         
            <textarea name="content" id="content" cols="30" rows="4" class="form-control"></textarea>
            <input type="hidden" value="{{ $question -> id }}" name="question_id" />
            <br>
            <input type="submit" class="btn btn-primary" value="Submit Answer">
        </form>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
@endsection