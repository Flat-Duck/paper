<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Book $book, Request $request)
    {
        $comment = new Comment();
        $comment->text = $request->comment;
        $comment->book_id = $book->id;
        $comment->user_id = auth()->id();
        $comment->star_rating = $request->rating;
        $comment->save();
        
        return back();
    }

}
