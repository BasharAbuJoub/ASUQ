@extends('layouts.side')


@section('content')

<h4 class="title is-4">Create Question</h4>

<form action="{{route('question.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="columns">
        <div class="column is-12">
            <div class="field">
                <label class="label">Question Body</label>
                <div class="control">
                    <textarea class="textarea" rows="3" class="input" name="body"></textarea>
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
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                    <input class="input" type="number" name="score" placeholder="Score" value="1">
                </div>
            </div>
        </div>
    </div>
    <div class="columns">
        <div class="column is-12">
            <upload-image></upload-image>
        </div>
    </div>
    <div class="columns">
        <div class="column is-12">
            <div class="field">
                <button type="submit" class="button is-success">Create</button>
            </div>
        </div>
    </div>

</form>
@endsection
