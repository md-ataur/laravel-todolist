<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormValidation;
use App\todo;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist = todo::all();        
        return view('todo.home',compact('datalist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormValidation $request)
    {   
        $todo = new todo;     
       /* $request->validate([
            'title' => 'required|unique:todos',
            'body' => 'required'
        ]);*/
        $todo->title = $request->title;
        $todo->body = $request->body;
        $todo->save();        
        return redirect('/todo');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = todo::find($id);
        return view('todo.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = todo::find($id);
        return view('todo.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFormValidation $request, $id)
    {
        $todo = todo::find($id);     
       /* $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);*/
        $todo->title = $request->title;
        $todo->body = $request->body;
        $todo->save();
        session()->flash('message','Updated Successfully');
        return redirect('/todo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = todo::find($id);
        $item->delete();
        session()->flash('message','Deleted Successfully');
        return redirect('/todo');
    }
}
