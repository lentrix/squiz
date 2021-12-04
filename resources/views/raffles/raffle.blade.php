@extends('base')

@section('content')

<div class="text-pink-900">
    <h1 class="text-xl">Raffle An Item</h1>
    <p class="text-xl text-pink-500">{{$item->name}} sponsored by {{$item->sponsor}}</p>
    <hr class="border-pink-200 mb-3">

    <label for="exclude"><input type="checkbox" checked="checked" id="exclude"> Exclude Previous Winners</label>

    <button class="bg-pink-900 text-xl p-2 text-pink-50 block mt-3 transform hover:bg-pink-500 transition duration-500" id="draw-btn">
        <i class="fa fa-award"></i> Raffle Draw Now
    </button>

    <div class="border border-pink-900 p-3 min-w-full bg-pink-50 h-40 mt-3" id="box">
        <p class="text-pink-900 text-xl text-center" style="display: none" id="congrats">Congratulations!!!</p>
        <h1 class="text-5xl text-gray-400 mt-3 text-center" id="winner"></h1>
    </div>

    <div id="winner-form" style="display: none">
        {!! Form::open(['url' => '/raffle-winner', 'method'=>'post']) !!}
            <input type="hidden" name="user_id" id="user_id">
            <input type="hidden" name="item_id" id="item_id" value="{{$item->id}}">
            <button class="bg-pink-900 p-2 w-40 mt-1 mx-auto block text-pink-50 transform hover:bg-pink-500 transition duration-500">
                <i class="fa fa-check"></i> Confirm Winner
            </button>
        {!! Form::close() !!}
    </div>
</div>

@endsection

@section('scripts')

<script>

$(document).ready(()=>{

    $("#draw-btn").click(()=>{
        var exclude = $("#exclude")
        var url

        if(exclude.prop('checked')) {
            url = '{{url("/api/non-winners")}}'
        }else {
            url = '{{url("/api/all-users")}}'
        }

        $("#winner-form").css('display','none')
        $("#winner").removeClass('text-pink-900').addClass('text-gray-400')
        $("#congrats").css('display','none')

        $.get(url, (res)=>{
            if(res.length <= 0) {
                alert('Fatal Error: Cannot get potential winners!')
                return
            }

            console.log("Users Size:", res.length)
            console.log(res)

            var el = $("#box h1")

            var count = 40;

            var rnd = setInterval(function(){
                user = res[Math.floor(Math.random()*res.length)]
                $("#winner").text(user.name)
                $("#user_id").val(user.id)
                if(--count == 0) {
                    clearInterval(rnd)
                    $("#congrats").css('display','block')
                    $("#winner").removeClass('text-gray-400').addClass('text-pink-900').addClass('font-bold')

                    $("#winner-form").css('display','block')
                }
            },100)
        })
    })
})

</script>

@endsection
