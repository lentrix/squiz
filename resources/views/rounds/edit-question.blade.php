@extends('base')

@section('content')

<div class="float-right">
    <a href="{{url('/round/' . $question->round->id . '/modify')}}"
        class="inline-block bg-pink-900 text-pink-50 px-3 py-1 text-sm transform hover:bg-pink-700 transition duration-500">
            <i class="fa fa-arrow-left"></i> Back
    </a>
</div>

<h1 class="text-xl pt-3 text-pink-900">{{$question->round->quiz->title}} | {{$question->round->name}}</h1>
<hr class="border-pink-200 border mb-3">

<h3 class="text-lg pt-3 text-pink-500">Edit Question</h3>
{!! Form::model($question, ['url'=>'/question/' . $question->id . '/edit', 'method'=>'put']) !!}

{!! Form::text('question', null, ['class'=>'border border-pink-200 p-1 min-w-full mb-3 shadow','placeholder'=>'Question']) !!}
{!! Form::text('answer', null, ['class'=>'border border-pink-200 p-1 min-w-full mb-3 shadow','placeholder'=>'Answer']) !!}
{!! Form::textarea('distractors', null, ['class'=>'border border-pink-200 p-1 min-w-full mb-3 shadow','placeholder'=>'Distractors separated by comma (,)','rows'=>3]) !!}

<button class="bg-pink-900 py-1 px-5 text-pink-50 transform hover:bg-pink-600 transition duration-500" type="submit">Update Question</button>

{!! Form::close() !!}
@endsection
