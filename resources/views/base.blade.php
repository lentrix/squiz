<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <title>SpeedQuiz</title>
</head>
<body>

    <div class="container shadow mt-5 mx-auto shadow-md">

        <section id="topbar" class="p-3 bg-pink-900 text-pink-200 flex">
            <a href="{{url('/')}}" class="text-2xl flex-1">SpeedQuiz</h1>
                @if(auth()->guest())
                    <div class="">
                        <a href="{{url('/register')}}">Register</a>
                    </div>
                @else
                    <div>
                        <a href="{{url('/logout')}}">Logout</a>
                    </div>
                @endif
        </section>

        <section id="body" class="bg-pink-100 py-5 px-3">
            @include('flash-messages')
            @yield('content')
        </section>

    </div>

    @yield('scripts')

</body>
</html>
