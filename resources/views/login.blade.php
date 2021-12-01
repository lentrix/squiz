
@extends('base')

@section('content')

<div class="">
    <h2 class="text-xl text-center">User Login</h2>

    <form action="{{url('/login')}}" method="post" class="text-center mt-5">
        @csrf
        <input type="email" class="border border-pink-200 shadow border-solid mb-3 block mx-auto" name="email" id="email" placeholder="Email">
        <input type="password" class="border border-pink-200 shadow border-solid mb-3 block mx-auto" name="password" id="password" placeholder="Password">
        <button class="transform bg-pink-900 text-pink-100 px-3 py-1 font-normal hover:bg-pink-500 transition duration-500 hover:scale-105">Login</button>
    </form>
</div>

@endsection
