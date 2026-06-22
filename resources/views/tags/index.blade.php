@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center">          
        <h1 class="text-white font-bold text-3xl w-70 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-2 shadow-lg shadow-mavs-navy">
            Tags
        </h1>
    </div>

    <div class="flex justify-end mb-1">
        <a href="{{ route('news.index') }}"
            class="text-white text-xs font-semibold px-3 py-1 rounded-full border border-red-500 hover:opacity-80"
            style="color: #DC143C; border-color: #DC143C;">
            ← News
        </a>
    </div>

    @if(auth()->user()->is_admin)
        <div class="flex items-center justify-center my-5">
            <a class="flex text-white bg-blue-700 px-4 py-1 w-50 h-10 rounded-full font-semibold items-center justify-center" 
            href="{{ route('tags.create') }}">+ Add New Tag</a>
        </div>
    @endif

    @if(session('success'))
        <p class="text-green-400 text-center mb-4">{{ session('success') }}</p>
    @endif

    @if($tags->isEmpty())
        <p class="text-white text-center">No tags yet.</p>
    @else
        <div class="flex flex-col gap-3 max-w-xl mx-auto">
            @foreach($tags as $tag)
                <div class="border border-mavs-navy rounded-xl p-4 flex items-center justify-between text-white">
                    <span class="font-semibold">{{ $tag->name }}</span>

                    @if(auth()->user()->is_admin)
                        <div class="flex items-center gap-3 text-sm">
                            <a href="{{ route('tags.edit', $tag->id) }}" class="text-yellow-500 font-semibold hover:underline">Edit</a>
                            <span class="text-gray-600">|</span>
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 font-semibold hover:underline">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
@endsection