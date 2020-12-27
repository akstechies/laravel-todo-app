<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function index()
    {
        //$todos = Todo::all();

        //$todos = Todo::orderBy('completed')->get();
        $todos = Todo::orderBy('completed', 'asc')->get();

        //return $todos;
        //return view('todos.index')->with(['todos' => $todos]);
        return view('todos.index',compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    //public function store(Request $request)
    public function store(TodoCreateRequest $request)
    {
        /*if(!$request->title){
            return redirect()->back()->with('error', 'Enter a Todo!!');
        }*/

        /*$request->validate([
            'title' => 'required|max:255',
        ]);*/

        /*$rules = [
            'title' => 'required|max:255',
        ];

        $messages = [
            'title.max' => 'Should Not Be greater than 255',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }*/

        Todo::create($request->all());
        return redirect()->back()->with('message', 'Todo Created Successfully');
    }

    public function edit(Todo $todo)   //$id
    {
        //$todo = Todo::find($id);

        //dd($todo->title);

        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {
        //dd($request->all());

        $todo->update(['title' => $request->title]);
        //return redirect()->back()->with('message', 'Updated!!');
        return redirect(route('todo.index'))->with('message', 'Updated!!');
    }


    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'Completed!!');
    }

    public function notcomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'Not Completed!!');
    }

    public function delete(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('message', 'Deleted!!');
    }


}
