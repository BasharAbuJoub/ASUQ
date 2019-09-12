@extends('layouts.side')

@section('content')

<h4 class="title is-pulled-left is-4">Exams</h4>
<a href="{{route('exam.create')}}" class="button is-success is-pulled-right">Create</a>
<table class="table is-fullwidth">
    <thead>
        <tr>
            <th>ID</th>
            <th>Exam Name</th>
            <th>Action</th>
        </tr>
    </thead>
    @foreach ($exams as $exam)

        <tr>
            <td>{{ $exam->id }}</td>
            <td>{{ $exam->name }}</td>
            <td>
                <a class="button is-success is-small"
                    href="{{ route('question.index', ['exam' => $exam->id]) }}">Questions</a>
                <a class="button is-danger is-small"
                    href="{{ route('exam.destroy', ['exam' => $exam->id]) }}">
                    Delete
                </a>
                <a class="button is-warning is-small"
                    href="{{ route('exam.edit', ['exam' => $exam->id]) }}">
                    Edit
                </a>
            </td>
        </tr>

    @endforeach
</table>

@endsection

