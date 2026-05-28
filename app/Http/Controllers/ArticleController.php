<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
class ArticleController extends Controller
{
    public function index()
    {
        // Get the latest 15 articles, older pages managed by pagination
        $articles = Article::latest()->paginate(15);

        return view('news.index', compact('articles'));
    }

    public function create()
    {
	Gate::authorize('create', Article::class);
        return view('news.create');
    }

    public function store(Request $request)
    {
	Gate::authorize('create', Article::class); //Lanjutan dari create
        $validated = $request->validate([
            'title' => 'required|string|max:125',
            'content' => 'required|string',
            'image' => 'nullable|url|max:255',
        ]);

        // Automatically generate url-friendly slug from title + set published date to now
        $validated['slug'] = Str::slug($request->title);
        $validated['published_at'] = now();
        Article::create($validated);

        return redirect()->route('news.index')->with('success', 'The article is published successfully.');
    }

    public function show($slug)
    {
        // Bug fix: find article by slug directly
        $article = Article::where('slug', $slug)->firstOrFail();

        return view('news.show', compact('article'));
    }

    public function edit($slug)
    {
	// Irritating Bug fix: find article by slug directly
        $article = Article::where('slug', $slug)->firstOrFail();
	Gate::authorize('update', $article);

        return view('news.edit', compact('article'));
    }

    public function update(Request $request, $slug)
    {
	
        // Irritating Bug fix: find article by slug directly
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

        return redirect()->route('news.index')->with('success', 'The article is updated.');
    }

    public function destroy($slug)
    {
	// Bug fix: find article with slug then delete	
        $article = Article::where('slug', $slug)->firstOrFail();
	Gate::authorize('delete', $article);
        $article->delete();

        return redirect()->route('news.index')->with('success', 'The article is removed.');
    }
}
