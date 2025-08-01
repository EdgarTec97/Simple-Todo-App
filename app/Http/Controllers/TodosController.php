<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Contracts\View\View;

class TodosController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "title" => "required|min:3"
        ]);
        $todo = new Todo();
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route("todos")->with("success", "Tarea creada correctamente");
    }

    public function index(): View
    {
        $todos = Todo::latest('id')->paginate(10); // orderBy("id", "desc")->paginate(10);

        return view("todos.index", compact("todos"));
    }

    public function destroy($id): RedirectResponse
    {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todos')->with('success', 'Todo deleted successfully');
    }

    public function show($id): View
    {
        $todo = Todo::find($id);
        # $categories = Category::all();
        return view('todos.show', "todo", "category");
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $todo = Todo::find($id);

        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('todos')->with('success', 'Todo updated successfully');
    }
}
