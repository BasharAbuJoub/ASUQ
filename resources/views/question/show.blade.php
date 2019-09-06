@extends('layouts.app')


@section('content')

    <div class="box">

        <h4 class="title is-4">Question</h4>
        @if($question->image != null)
            <img src="{{asset($question->image)}}">
        @endif
        <p>{{ $question->body }}</p>
        <hr>
        <ul>
            @foreach ($question->answers as $answer)
                <li>
                    @if($answer->image != null)
                        <img src="{{asset($answer->image)}}">
                    @endif
                    {{ $answer->body }}
                </li>
            @endforeach
        </ul>
    </div>

@endsection
