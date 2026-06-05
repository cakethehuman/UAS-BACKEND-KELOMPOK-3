<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\Article;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = comments::all();
        return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'body' => 'required',
        ]);

        comments::create([
            'article_id' => $request->article_id,
            'body' => $request->body,
        ]);

        return redirect()->back()->with('success', 'Commented !');
    }

    /**
     * Display the specified resource.
     */
    public function show(comments $comments)
    {
        return view('comments.show', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comments $comments)
    {
        return view('comments.edit', compact('comments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comments $comments)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'body' => 'required',
        ]);

        $article_id = (int) $request->article_id;

        $comments->update([
            'article_id' => $article_id,
            'body' => $request->body,
        ]);

        $article = Article::where('id', $article_id)->firstOrFail();
        return redirect()->route('news.show', $article->slug)->with('success', 'Comment updated.');
        // admin should be able to edit all comments, while users should not be able to edit other users's comments.
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comments $comments)
    {
        $article_id = (int) $comments->article_id;
        $comments->delete();

        $article = Article::where('id', $article_id)->firstOrFail();
        return redirect()->route('news.show', $article->slug)->with('success', 'Comment deleted.');
        // would be interesting for admin to be able to do this: "This comment has been removed by a moderator"
    }
}