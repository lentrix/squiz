@extends('base')

@section('content')

<div class="text-pink-900">

    <h1 class="text-lg">Attempt {{$round->name}} of {{$round->quiz->title}}</h1>
    <div class="text-pink-700">Attempt started: {{$attempt->start->addHours(8)->format('M d, Y g:i:s A')}}</div>
    <hr class="border border-pink-200 mb-3">

</div>

{!! Form::open(['url'=>'/round/' . $round->id . '/attempt', 'method'=>'post']) !!}

@foreach($round->questions as $question)

<div class="border border-pink-200 shadow mb-3 p-3 bg-pink-50">
    <p class="font-bold">{{$question->question}}</p>
    <div>
        @foreach($question->options as $option)
            <label class="block">
                <input type="radio" name="answer[{{$question->id}}]" value="{{trim($option)}}">
                {{trim($option)}}
            </label>
        @endforeach
    </div>
</div>

@endforeach

<button type="submit" class="bg-pink-900 text-pink-50 p-2 w-42 transform hover:bg-pink-500 transition duratiobn-500 block mx-auto">Submit Answers</button>

{!! Form::close() !!}

@endsection


@section('scripts')

<script>

$(document).ready(()=>{
})

</script>

@endsection
