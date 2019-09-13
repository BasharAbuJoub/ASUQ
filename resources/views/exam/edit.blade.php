@extends('layouts.side')

@section('content')




        <h4 class="title is-4">Edit Exam ({{ $exam->name }})</h4>

        <form method="POST" action="{{ route('exam.edit', ['exam' => $exam->id]) }}">

            <div class="field">
                <label class="label">Name</label>
                <div class="control">
                    <input class="input" type="text" name="name" placeholder="Exam name">
                </div>
            </div>

            <div class="field">
                <label class="label">Choose exam questions</label>
                <div class="box" style="overflow-y: scroll; min-height: 300px; max-height: 400px;">
                    @foreach ($questions as $question)
                    <label class="checkbox">
                        <input type="checkbox">
                        {{ $question->body }}
                    </label>
                    <hr style="margin: 1rem 0;">
                    @endforeach
                </div>
            </div>




            <button class="button is-link">Choose questions</button>



        </form>


@endsection
