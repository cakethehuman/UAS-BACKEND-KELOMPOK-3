<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $store = Store::all();
        return view("store.index", compact("store"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
	Gate::authorize('create',  Store::class); 
        return view("store.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
	Gate::authorize('create',  Store::class); 
        $request->validate([
            'name' => 'required|string',
            'category' => 'required|string', 
            'type' => 'nullable|string', 
            'description' => 'nullable|string',
            'price' => 'required|integer', 
            'image' => 'required|string',  
        ]);

        Store::create($request->all());
        return redirect()->route('store.index')->with('success', 'Product has been added to the store.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        return view('store.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
	Gate::authorize('update',  $store); 
        return view('store.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
	Gate::authorize('update',  $store); 
         $request->validate([
            'name' => 'required|string',
            'category' => 'required|string', 
            'type' => 'nullable|string', 
            'description' => 'nullable|string',
            'price' => 'required|integer', 
            'image' => 'required|string',  
        ]);

        $store->update($request->all());
        return redirect()->route('store.index')->with('success', 'Product successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
	Gate::authorize('delete',  $store); 
        $store -> delete();

        return redirect()->route('store.index')->with('success', 'Product deleted.');
    }
}
