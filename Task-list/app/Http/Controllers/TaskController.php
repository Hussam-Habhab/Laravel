<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $tasks = Task::paginate(5);
        // dd(auth()->user()->task()->get());

        // return view('tasks.index',['tasks' => $tasks]);
        
        if(auth()->user()){
            return view('tasks.index',['tasks' => auth()->user()->task()->get()]);
        }
        else{
            return view('tasks.index',['tasks'=> null]);
        }
        
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if(auth()->user()){
        if(Auth::check()){
        return view('tasks.create');
        }
        else{
            return redirect()->route('tasks.index')->with('err' ,'you need to sign in first ');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Task $task)
    {
        // dd("jiihi");
        $data = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'long_description' => 'required'
        ]);
        // dd($data);
        // dd('aaaa');
        // $task->create([
        //     'title' => $data['title'],
        //     'description' => $data['description'],
        //     'long_description' => $data['long_description'],
        //     'user_id'=> $request->user()->id
        //     // 'title' => $request->input('title'),
        //     // 'description' => $request->input('description'),
        //     // 'long_description' => $request->input('long_description'),
        // ]);
        auth()->user()->task()->create($data);

        return redirect()->route('tasks.index' ,$task)->with('success' ,'successfully added ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {

        return view('tasks.show',['task'=> $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {

        return view('tasks.edit',['task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Task $task)
    {
        $data = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'long_description' => 'required'
        ]);
        $task->update($data);
        
        auth()->user()->task()->update($data);

        return redirect()->route('tasks.index' ,$task)->with('success' ,'successfully added ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //

        $task->delete();

        return redirect()->route('tasks.index')->with('success','task successfully deleted.');
    }
}
