<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\tags;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
class ArticleController extends Controller
{
    public function index()
    {
        // Get the latest 15 articles with tags, older pages managed by pagination
        $articles = Article::with('tags')->latest()->paginate(15);

        return view('news.index', compact('articles'));
    }

    public function create()
    {
    Gate::authorize('create', Article::class);
        $tags = tags::all();
        return view('news.create', compact('tags'));
    }

    public function store(Request $request)
    {
	Gate::authorize('create', Article::class);
        $validated = $request->validate([
            'title' => 'required|string|max:125',
            'content' => 'required|string',
            'image' => 'nullable|url|max:255',
        ]);

        // Automatically generate url-friendly slug from title + set published date to now
        $validated['slug'] = Str::slug($request->title);
        $validated['published_at'] = now();
        $article = Article::create($validated);
        
        if ($request->has('tags')) {
            $article->tags()->sync($request->tags);
        }

        return redirect()->route('news.index')->with('success', 'The article is published successfully.');
    }

    public function show($slug)
    {
        $article = Article::with('tags')->where('slug', $slug)->firstOrFail();
 
        return view('news.show', compact('article'));
    }

    public function edit($slug)
    {
        $article = Article::with('tags')->where('slug', $slug)->firstOrFail();

    Gate::authorize('update', $article);
        $tags = tags::all();
        return view('news.edit', compact('article', 'tags'));
    }

    public function update(Request $request, $slug)
    {
	
        $article = Article::where('slug', $slug)->firstOrFail();
	Gate::authorize('update', $article);
        $validated = $request->validate([
            'title' => 'required|string|max:125',
            'content' => 'required|string',
            'image' => 'nullable|url',
        ]);

        // Automatically give slug from the updated title
        $validated['slug'] = Str::slug($request->title);
        $article->update($validated);

        $article->tags()->sync($request->tags ?? []);

        return redirect()->route('news.index')->with('success', 'The article is updated.');
    }

    public function destroy($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
    
    Gate::authorize('delete', $article);
        $article->delete();
 
        return redirect()->route('news.index')->with('success', 'The article is removed.');
    }
}
