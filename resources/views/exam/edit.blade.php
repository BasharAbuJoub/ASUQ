@extends('layouts.side')

@section('content')




        <h4 class="title is-4">Edit Exam ({{ $exam->name }})</h4>

        <form method="POST" action="{{ route('exam.update', ['exam' => $exam->id]) }}">
            @csrf
            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control">
                            <input class="input" value="{{$exam->name}}" type="text" name="name" placeholder="Exam name">
                        </div>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="field">
                        <label class="label">Duration</label>
                        <div class="control">
                            <input class="input" value="{{$exam->duration}}" type="number" name="duration" placeholder="Exam duration">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="field">
                <label class="label">Choose exam questions</label>
                <div style="overflow-y: auto; min-height: 300px; max-height: 400px;border: 2px solid #f5f5f5;padding: 16px;">
                    @foreach ($questions as $question)
                    <label class="checkbox">
                        <input type="checkbox" name="questions[]" value="{{$question->id}}"
                            @if($exam->questions->contains($question->id))
                                checked
                            @endif
                         >
                        {{ $question->body }}
                    </label>
                    <hr style="margin: 1rem 0;">
                    @endforeach
                </div>
            </div>




            <button class="button is-success">Save</button>



        </form>


@endsection
