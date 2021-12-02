@extends('base')

@section('content')

<h1 class="pt-3 text-xl text-pink-900">Create Quiz</h1>
<hr class="border-pink-200 mb-3">

<form action="{{url('/quiz')}}" method="post">
    @csrf
    <input type="text" name="title" class="border border-pink-200 p-1 min-w-full mb-3 shadow" placeholder="Quiz Name">
    <input type="text" name="description" class="border border-pink-200 p-1 min-w-full mb-3 shadow" placeholder="Description">

    <button class="transform bg-pink-900 text-pink-50 w-42 p-2 hover:bg-pink-700 transition duration-500 hover:scale-110 block mx-auto">Create Quiz</button>
</form>

@endsection
