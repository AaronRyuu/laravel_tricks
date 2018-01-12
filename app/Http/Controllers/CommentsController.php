<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
//        return $request->all();
        $comment = Comment::create($request->all());
        return view('shared._comment', compact('comment'));
    }
}