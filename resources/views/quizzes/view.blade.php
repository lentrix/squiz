@extends('base')

@section('content')

@if(auth()->user()->admin)
<div class="float-right">
    <a href="{{url('/quiz/edit/' . $quiz->id)}}"
            class="inline-block bg-pink-900 text-pink-50 px-3 py-1 text-sm transform hover:bg-pink-700 transition duration-500">
        <i class="fa fa-edit"></i> Modify Quiz
    </a>
</div>
@endif


<h1 class="text-xl pt-3 text-pink-900">Quiz: {{$quiz->title}}</h1>
<hr class="border-pink-200 border mb-3">

<div class="text-pink-900">
    <p class="font-bold">Description</p>
    {{$quiz->description}}

    <p class="font-bold mt-3">Rounds</p>

    @foreach($quiz->rounds as $round)
        <div class="border p-2 border-pink-500 mb-2 @if($round->active) bg-green-200 @else bg-pink-50 @endif">
            {{$round->round_no}}. {{$round->name}} ({{count($round->questions)}} questions)
            <div class="float-right">
                @if(auth()->user()->admin)
                <a href="{{url('/round/' . $round->id . "/activate")}}" class="ml-3" title="Activate">
                    <i class="fa fa-check"></i>
                </a>
                <a href="{{url('/round/' . $round->id . "/modify")}}" class="ml-3" title="Modify">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="{{url('/round/' . $round->id . "/close")}}" class="ml-3" title="Close">
                    <i class="fa fa-times"></i>
                </a>
                @endif
                @if($round->active)
                    <a href="{{url('/round/' . $round->id . "/close")}}" class="ml-3" title="Attempt this round">
                        [Attempt]
                    </a>
                @endif
            </div>
        </div>
    @endforeach
</div>


@endsection
