@extends('base')

@section('content')

<div class="float-right">
    <a href="{{url('/quiz/' . $quiz->id)}}" class="bg-pink-900 px-3 py-1 text-pink-50 text-sm transform hover:bg-pink-700 transition duration-500">
        <i class="fa fa-arrow-left"></i> Back
    </a>
</div>

<h1 class="text-xl pt-3 text-pink-900">Modify Quiz</h1>
<hr class="border border-pink-200 mb-3">

{!! Form::model($quiz, ['url' => '/quiz/' . $quiz->id, 'method'=>'put']) !!}
    {!! Form::text("title", null, ['class'=>'border border-pink-200 p-1 min-w-full mb-3 shadow','placeholder'=>'Quiz Name']) !!}
    {!! Form::text("description", null, ['class'=>'border border-pink-200 p-1 min-w-full mb-3 shadow', 'placeholder'=>'Description']) !!}
    <button class="transform bg-pink-900 text-pink-50 w-42 p-2 hover:bg-pink-700 transition duration-500 hover:scale-110 block mx-auto">Update Quiz</button>
{!! Form::close() !!}

<hr class="border border-pink-200 my-3">

<h3 class="text-lg text-pink-900 opacity-80">Rounds</h3>

@if(count($quiz->rounds)==0)
    No rounds.
@else
    @foreach($quiz->rounds as $round)

    <div>{{$round->round_no}}. {{$round->name}}</div>

    @endforeach
@endif

<h3 class="text-lg text-pink-900 opacity-80">Add Round</h3>
{!! Form::open(['url'=>'/quiz/' . $quiz->id, 'method'=>'patch']) !!}
    <div class="flex items-start">
        {!! Form::text('round_name', null, ['class'=>'block border border-pink-200 p-1 mb-3 shadow flex-1', 'placeholder'=>'Round Name']) !!}
        {!! Form::number('round_number', null, ['class'=>'block border border-pink-200 p-1 mb-3 shadow w-32', 'placeholder'=>'Round Number']) !!}
        <button class="bg-pink-900 text-pink-50 w-28 text-sm p-1 h-8 transform hover:bg-pink-700 transform duration-500">
            <i class="fa fa-plus"></i> Add Round
        </button>
    </div>
{!! Form::close() !!}
@endsection
