@if (session('Error'))
<div class="p-2 bg-pink-700 text-red text-sm text-pink-50">
        {!! session('Error') !!}
</div>
@endif

@if (session('Info'))
<div class="p-2 bg-green-700 text-green-50 text-xs">
    {!! session('Info') !!}
</div>
@endif

@if(session('errors'))
<div class="p-2 bg-pink-700 text-red text-sm text-pink-50">
    <div class="container">
        Please fix the following errors
        <ul>
            @foreach(session('errors')->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
