<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        //dd($request);

        $request->validate([
            'text' => 'required|string',
            'author' => 'required|string',
            'link' => 'nullable|string',
            'users_id' => 'required|integer',
            'model_name'=> 'required|string',
            'model_record' => 'required|integer',
        ]);

        $Comment = new Comment();
        $Comment->users_id = auth()->user()->id;
        $Comment->text = $request->text;
        $Comment->author = $request->author;
        $Comment->link = $request->link;
        $Comment->model_name = $request->model_name;
        $Comment->model_record = $request->model_record;
            
        $Comment->save();

        return back()->with('success', 'Comment added successfully!');
    }
}
