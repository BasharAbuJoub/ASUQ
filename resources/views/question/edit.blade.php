@extends('layouts.side')


@section('content')

<h4 class="title is-4">Edit Question #{{$question->id}}</h4>

<form action="{{route('question.update', ['question' => $question->id])}}" method="POST">
    @csrf
    <div class="columns">
        <div class="column is-12">
            <div class="field">
                <label class="label">Question Body</label>
                <div class="control">
                    <textarea class="textarea" rows="3" class="input" name="body">{{ $question->body }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="columns">
        <div class="column is-6">
            <div class="field">
                <label class="label">Category</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select name="category_id">
                            @foreach ($categories as $category)
                            <option
                            @if($category->id == $question->category_id)
                                selected
                            @endif
                            value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        </div>
        <div class="column is-6">
            <div class="field">
                <label class="label">Score</label>
                <div class="control">
                    <input class="input" type="number" name="score" placeholder="Score" value="{{$question->score}}">
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="columns">
        <div class="column is-12">
            <upload-image></upload-image>
        </div>
    </div> --}}
    <hr>

    <div class="columns">
        <div class="column is-12">
{{--
            <div class="field">
                <answers-group></answers-group>
            </div> --}}

            <h4 class="title is-4">Answers</h4>
            @foreach ($answers as $i=>$answer)
                <div class="columns">
                    <div class="column is-12">
                            <label class="label">Answer #{{$i+1}}</label>
                        <div class="field is-grouped">

                            <div class="control is-expanded">
                                <textarea class="input" class="textarea" name="answer_body[]"
                                 >{{$answer->body}}</textarea>
                            </div>
                            <div class="control">
                                    <input style="margin-top: 12px;" type="checkbox" name="is_correct[]" :value="{{$i}}"
                                    @if($answer->is_correct)
                                        checked
                                    @endif
                                    > Is correct ?
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="field">
                <button type="submit" class="button is-success">Update</button>
            </div>
        </div>
    </div>

</form>
@endsection
