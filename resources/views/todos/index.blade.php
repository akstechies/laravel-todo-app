
@extends('todos.layout')


@section('content')

{{-- <?php foreach ($todos as $key => $value) {
    echo $value['title'];
} ?> --}}

    <h1 class="text-4xl">All</h1>
    <br>
    <a class="py-2 px-1 bg-blue-400 cursor-pointer rounded text-white" href="/todos/create/">Create</a>
    <br><br>
<ul>
    <x-alert />
     @foreach ($todos as $todo)
    <li>
        @if($todo->completed)
        <span class="line-through">{{ $todo->title}}</span>
        @else
        <span>{{ $todo->title}}</span>
        @endif

         <a class="py-2 px-1 bg-pink-400 cursor-pointer rounded text-white" href="{{'/todos/'.$todo->id. '/edit/'}}">Edit</a>
         @if($todo->completed)
         <span onclick="event.preventDefault(); document.getElementById('form-notcomplete-{{$todo->id}}').submit()" class="py-2 px-1 bg-yellow-400 cursor-pointer rounded text-white">Undone</span>
            <form style="display: none" id="{{'form-notcomplete-'.$todo->id}}" method="POST" action="{{route('todo.notcomplete', $todo->id)}}">
                @csrf
                @method('put')
                </form>
         @else
         <span onclick="event.preventDefault(); document.getElementById('form-complete-{{$todo->id}}').submit()" class="py-2 px-1 bg-green-400 cursor-pointer rounded text-white">Done</span>

            <form style="display: none" id="{{'form-complete-'.$todo->id}}" method="POST" action="{{route('todo.complete', $todo->id)}}">
            @csrf
            @method('put')
            </form>

         @endif

         <span onclick="event.preventDefault(); document.getElementById('form-delete-{{$todo->id}}').submit()" class="py-2 px-1 bg-red-400 cursor-pointer rounded text-white">Delete</span>
            <form style="display: none" id="{{'form-delete-'.$todo->id}}" method="POST" action="{{route('todo.delete', $todo->id)}}">
                @csrf
                @method('delete')
                </form>
    </li>
    <br>
    @endforeach
</ul>

@endsection
