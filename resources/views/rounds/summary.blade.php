@extends('base')


@section('content')

<h1 class="text-xl pt-3 text-pink-900">{{$round->quiz->title}} | {{$round->name}} | Summary</h1>
<hr class="border-pink-200 border mb-3">


<table class="border-collapse min-w-full border">
    <thead>
        <tr class="bg-pink-900 text-pink-200 border">
            <th class="p-1 border-l">Name</th>
            <th class="p-1 text-center border-l">Score</th>
            <th class="p-1 text-center border-l">Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach($round->summary as $summary)
        <tr class='bg-pink-50'>
            <td class="border border-pink-300">{{$summary['name']}}</td>
            <td class="border border-pink-300 text-center">{{$summary['score']}}</td>
            <td class="border border-pink-300 text-center">{{$summary['time']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
