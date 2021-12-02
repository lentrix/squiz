@extends('base')

@section('content')

<div class="float-right">
    <a href="{{url('/round/' . $attempt->round->id . '/summary')}}"
        class="inline-block bg-pink-900 text-pink-50 px-3 py-1 text-sm transform hover:bg-pink-700 transition duration-500">
    <i class="fa fa-edit"></i> Round Summary
</a>
</div>

<h1 class="text-xl pt-3 text-pink-900">{{$attempt->round->quiz->title}} | {{$attempt->round->name}} | Result</h1>
<hr class="border-pink-200 border mb-3">

<div class="my-2 flex">
    <div class='flex-1'><strong>Score:</strong> {{$attempt->result['score']}}</div>
    <div class='flex-1'><strong>Time:</strong> {{$attempt->result['time']}} sec</div>
</div>

<hr class="border-pink-200 border mb-3">

@foreach($attempt->answers as $answer)

<div class='border-pink-200 border bg-pink-50 p-2 shadow mb-3 flex'>
    <div class='mr-2'>
        @if($answer->answer == $answer->question->answer)
            <i class="fa fa-check text-green-400"></i>
        @else
            <i class="fa fa-times text-red-400"></i>
        @endif
    </div>

    <div class='flex-1'>{{$answer->question->question}} You answered <strong>{{$answer->answer}}</strong>.</div>
</div>

@endforeach


@endsection
