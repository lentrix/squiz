@extends('base')

@section('content')

<div class="float-right">
    <a href="{{url('/quiz/' . $round->quiz->id)}}"
        class="inline-block bg-pink-900 text-pink-50 px-3 py-1 text-sm transform hover:bg-pink-700 transition duration-500">
            <i class="fa fa-arrow-left"></i> Back
    </a>
    <a href="{{url('/round/' . $round->id . '/add-question')}}"
        class="inline-block bg-pink-900 text-pink-50 px-3 py-1 text-sm transform hover:bg-pink-700 transition duration-500">
            <i class="fa fa-plus"></i> Add Question
    </a>
</div>

<h1 class="text-xl pt-3 text-pink-900">{{$round->quiz->title}} | {{$round->name}}</h1>
<hr class="border-pink-200 border mb-3">

@foreach($round->questions as $question)

    <div class="mb-3 p-2 bg-pink-50 border border-pink-200 shadow">
        <div class="float-right text-pink-700">
            <a href="{{url('/question/' . $question->id . '/delete')}}" class="ml-2"><i class="fa fa-trash"></i></a>
            <a href="{{url('/question/' . $question->id . '/edit')}}" class="ml-2"><i class="fa fa-edit"></i></a>
        </div>
        <p class="font-bold">{{$question->question}}</p>
        <p>Answer: {{$question->answer}}</p>
        <p>
            Distractors: <br>
            {{$question->distractors}}
        </p>
    </div>

@endforeach

@endsection
