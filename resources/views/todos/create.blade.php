@extends('todos.layout')


@section('content')
<h1 class="text-3xl">Create</h1>
<x-alert />
<form action="/todos/create" method="post" class="py-5">
    @csrf
    <input type="text" name="title" class="p-2 border rounded-lg">
    <input type="submit" value="create" class="p-2 border rounded-lg">
    <a class="py-2 px-1 bg-blue-400 cursor-pointer rounded text-white" href="/todos/">Home</a>
</form>
@endsection
