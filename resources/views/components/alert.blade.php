<div>

    @if(session()->has('message'))
    {{$slot}}
    <div class="p-2 bg-green-300">
        {{ session()->get('message') }}
    </div>
    @elseif(session()->has('error'))
    {{$slot}}
    <div class="p-2 bg-red-300">
        {{ session()->get('error') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="p-2 bg-red-300">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>
