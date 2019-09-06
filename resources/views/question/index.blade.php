@extends('layouts.side')


@section('content')
    <h4 class="title is-pulled-left is-4">Questions</h4>
    <a href="{{route('question.create')}}" class="button is-success is-pulled-right">Create</a>
    <table class="table is-fullwidth">
        <thead>
            <tr>
                <th>ID</th>
                <th>Body</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($questions as $question)

            <tr>
                <td>{{ $question->id }}</td>
                <td class="" style="width: 250px;">{{ $question->body }}</td>
                <td>{{ $question->category->name }}</td>
                <td>
                    <a class="button is-link is-small" href="{{ route('question.show', ['question' => $question->id]) }}">Preview</a>
                    <a class="button is-warning is-small" href="{{ route('question.edit', ['question' => $question->id]) }}">Edit</a>
                    <a class="button is-danger is-small"
                        href="{{ route('question.destroy', ['question' => $question->id]) }}">
                        Delete
                    </a>
                </td>
            </tr>

        @endforeach
    </table>

@endsection
