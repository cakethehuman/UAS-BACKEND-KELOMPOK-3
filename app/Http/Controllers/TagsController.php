<?php

namespace App\Http\Controllers;

use App\Models\tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = tags::latest()->get();
        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }
        
        $request->validate([
            'name' => 'required|string|max:10|unique:tags,name',
        ]);
 
        tags::create(['name' => $request->name]);
 
        return redirect()->route('tags.index')->with('success', 'Tag created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(tags $tag)
    {
        // Not used
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tags $tag)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tags $tag)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }
        $request->validate([
            'name' => 'required|string|max:10|unique:tags,name,' . $tag->id,
        ]);
 
        $tag->update(['name' => $request->name]);
 
        return redirect()->route('tags.index')->with('success', 'Tag updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tags $tag)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }
        $tag->delete();
 
        return redirect()->route('tags.index')->with('success', 'Tag deleted.');
    }
}
