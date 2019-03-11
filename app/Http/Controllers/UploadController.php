<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index()
    {
        $files = File::all();
        return view("upload.upload", compact("files"));
    }
    public function store(request $request)
    {
        if ($request->hasFile('image')) {
            //$request->file('image');
            //return $request->image->extension();
            //return $request->image->store('public');
            //return $request->image->storeAs('public','abc.jpg');
            //return Storage::putFile('public',$request->file('image'));
            //$filename =  $request->image->getClientOriginalName();
            //return $request->image->storeAs('public/upload',$filename);
            $filesize   = $request->image->getClientSize();
            $filename   = $request->file('image')->store('public/upload');
            $file       = new File;
            $file->name = $filename;
            $file->size = $filesize;
            $file->save();
            session()->flash('message', 'Your File Uploaded');
            return redirect('/upload');

        } elseif ($request->hasFile('file')) {
            ///return $request->all();
            foreach ($request->file as $file) {
                //print_r($file->getClientOriginalName()."<br>");
                $orgname         = $file->getClientOriginalName();
                $filesize        = $file->getClientSize();
                $filename        = $file->storeAs('public/upload', $orgname);
                $fileModel       = new File;
                $fileModel->name = $filename;
                $fileModel->size = $filesize;
                $fileModel->save();
            }
            session()->flash('message', 'Your File Uploaded');
            return redirect('/upload');
        }else {
            session()->flash('message', 'Your file is Empty');
            return redirect('/upload');
        }
    }
    public function show($id)
    {
        //return Storage::allFiles('public');
        //return Storage::makeDirectory('public/make');
        /*if (Storage::deleteDirectory('public/make')){
        return "Deleted";
        }*/
        //return Storage::size('public/abc.jpg');
        //return Storage::lastModified('public/abc.jpg');
        //return Storage::copy('public/abc.jpg', 'new/abc.jpg');
        //return Storage::move('public/abc.jpg', 'new/abc.jpg');
        $file  = File::find($id);
        $image = Storage::url($file->name);
        return "<img src='" . $image . "'/>";
    }
}
