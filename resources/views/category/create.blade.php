@extends('layouts.side')


@section('content')

    <h4 class="title is-4">Create Category</h4>

    <form action="{{route('category.store')}}" class="column is-6" method="POST">
        @csrf

        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" type="text" name="name" placeholder="Category name">
            </div>
        </div>
        <button type="submit" class="button is-success">Create</button>

    </form>
@endsection
