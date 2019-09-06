@extends('layouts.side')


@section('content')

    <h4 class="title is-4">Edit Category ({{$category->name}})</h4>

    <form action="{{route('category.update', ['category' => $category->id])}}" class="column is-6" method="POST">
        @csrf
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" type="text" name="name" value="{{$category->name}}" placeholder="Category name">
            </div>
        </div>
        <button type="submit" class="button is-success">Update</button>

    </form>
@endsection
