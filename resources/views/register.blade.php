@extends('base')

@section('content')

<div>
    <h1 class="text-xl text-center">User Registration</h1>

    <form action="{{url('/register')}}" method="post">
        @csrf

        <div class="w-72 mx-auto pt-5">
            <input type="text" name="name" id="name" placeholder="Name"
                class="block min-w-full border border-pink-200 shadow mb-3 p-1">
            <input type="email" name="email" id="email" placeholder="Email"
                class="block min-w-full border border-pink-200 shadow mb-3 p-1">
            <input type="password" name="password" id="password" placeholder="Password"
                class="block min-w-full border border-pink-200 shadow mb-3 p-1">
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"
                class="block min-w-full border border-pink-200 shadow mb-3 p-1">

            <button class="bg-pink-900 text-pink-200 block px-5 py-1 w-44 mx-auto transform hover:bg-pink-700 transision duration-500 hover:scale-110">Register</button>
        </div>
        <br><br>
    </form>
</div>

@endsection
