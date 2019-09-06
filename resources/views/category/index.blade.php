@extends('layouts.side')


@section('content')
    <h4 class="title is-pulled-left is-4">Categories</h4>
    <a href="{{route('category.create')}}" class="button is-success is-pulled-right">Create</a>
    <table class="table is-fullwidth">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($categories as $category)

            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a class="button is-success is-small"
                        href="{{ route('question.index', ['category' => $category->id]) }}">Questions</a>
                    <a class="button is-danger is-small"
                        href="{{ route('category.destroy', ['category' => $category->id]) }}">
                        Delete
                    </a>
                    <a class="button is-warning is-small"
                        href="{{ route('category.edit', ['category' => $category->id]) }}">
                        Edit
                    </a>
                </td>
            </tr>

        @endforeach
    </table>

@endsection
