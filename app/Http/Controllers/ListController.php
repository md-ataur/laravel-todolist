<?php

namespace App\Http\Controllers;

use App\item;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index(){
    	$items = item::all();    	
    	return view('todoajax.list',compact('items'));
    }
    public function create(request $request){
    	$item = new item;
    	$item->name = $request->text;
    	$item->save();
    	return "Successfully Inserted";
    }

    public function delete(request $request){
    	item::where('id',$request->id)->delete();
    	return $request->all();
    }

    public function update(request $request){
    	$item = item::find($request->id);
    	$item->name = $request->value;
    	$item->save();
    	return $request->all();
    }

    public function search(request $request){
    	$term = $request->term;    	
    	$items = item::where('name','LIKE','%'.$term.'%')->get();
    	if (count($items) == 0) {
    	 $result[] = "No result found";    	 
    	} else {
    		foreach ($items as $key => $value) {
    			$result[] = $value->name;
    		}
    	}   	
    	return $result;
    	//return $request->all();
    }
}
