@extends('base')

@section('content')

<h1 class="text-xl">List of Quizzes</h1>
<hr>
<br>
@foreach($quizzes as $quiz)

<div class="p-2 bg-white text-pink-900 shadow flex border-l-4 mb-3 border-pink-900">
    <div class="flex-1">{{$quiz->title}} | {{$quiz->description}}</div>
    <a href="{{url('/quiz/' . $quiz->id)}}" title="Open this quiz">
        <i class="fas fa-folder-open"></i>
    </a>
</div>

@endforeach

@endsection
