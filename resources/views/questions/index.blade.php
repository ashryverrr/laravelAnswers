@extends('layouts.appp')

@section('content')
    <div class="container">     
        <h1> Recent Questions </h1>
        <hr/>
        @if($questions->count() > 0)
            @foreach ($questions as $question)
                <div class="card m-2">
                    <div class="card-title">
                            <h3 class="card-header">{{ $question->title }}</h3>
                    </div>
                    <div class="card-body">
                            <p>
                                {{ $question->description }}
                            </p>
                            <a href="{{ route('questions.show', $question->id) }}" class="btn btn-primary btn-small">
                                View Details
                            </a>
                    </div>
                </div>
            @endforeach
        @else 
        <div class="card m-2">
            <div class="card-title">
                    <h3 class="card-header"> No questions yet.</h3>
            </div>
            <div class="card-body">
                Have any questions? Click here to start asking.
            </div>
        </div>
        @endif
        {{ $questions->links() }}            
    </div>
@endsection