@extends('base')

@section('content')

<div class="text-pink-900">
    <h1 class="text-xl mt-3">Raffle Items</h1>
    <hr class="border border-pink-200 mb-3">

    <div>
        {!! Form::open(['url'=>'/raffle-item', 'method'=>'post']) !!}

        {!! Form::text('name', null, ['class'=>'border border-pink-200 shadow border-solid w-38 mr-1','placeholder'=>'Item Name']) !!}
        {!! Form::text('sponsor', null, ['class'=>'border border-pink-200 shadow border-solid w-38 mr-1','placeholder'=>'Sponsor']) !!}

        <button class="bg-pink-900 text-pink-50 px-2 transform hover:bg-pink-500 transition duration-500">
            <i class="fa fa-plus"></i> Add Item
        </button>
        {!! Form::close() !!}
    </div>

    <hr class="border border-pink-200 mb-3">

    <table class="border border-pink-200 min-w-full">
        <thead>
            <tr class="bg-pink-900 text-pink-50 text-left">
                <th>Item Name</th>
                <th>Sponsor</th>
                <th class="text-right">
                    <i class="fa fa-cog mr-2"></i>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($availableItems as $item)
                <tr class="bg-pink-50 border-b border-pink-300">
                    <td class="p-1">{{$item->name}}</td>
                    <td class="p-1">{{$item->sponsor}}</td>
                    <td class="p-1 text-right">
                        <a href="{{url('/raffle/' . $item->id)}}" class="bg-pink-900 text-pink-50 w-8 inline-block text-center">
                            <i class="fa fa-award"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="text-xl mt-4">List of Winners</h2>
    <hr class="border border-pink-200 mb-3">

    <table class="border border-pink-200 min-w-full">
        <thead>
            <tr class="bg-pink-900 text-pink-50 text-left">
                <th>Winner</th>
                <th>Item</th>
                <th>Sponsor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wonItems as $raffle)

            <tr class="bg-pink-50">
                <td class='border border-pink-200'>{{$raffle->user->name}}</td>
                <td class='border border-pink-200'>{{$raffle->name}}</td>
                <td class='border border-pink-200'>{{$raffle->sponsor}}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@endsection
