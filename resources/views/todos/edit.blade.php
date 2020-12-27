
@extends('todos.layout')


@section('content')
{{$todo->title}}

<x-alert />
<form action="{{route('todo.update',$todo->id)}}" method="post" class="py-5">
    @csrf
    @method('patch')
    <input type="text" name="title" value="{{$todo->title}}" class="p-2 border rounded-lg">
    <input type="submit" value="update" class="p-2 border rounded-lg">
    <a class="py-2 px-1 bg-blue-400 cursor-pointer rounded text-white" href="/todos/">Home</a>
</form>

@endsection



