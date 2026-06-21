@extends('layouts.app')

@section('content')
    <div class="flex border border-mavs-navy rounded-full w-3xl px-6 py-2 mb-4">
        <h1 class="text-white text-xl">Edit Article</h1>
    </div>

    <p class="mb-4"><a href="{{ route('news.index') }}" style="color: #DC143C; font-weight: bold;">Cancel</a></p>

    @if ($errors->any())
        <div class="text-red-500 mb-4">
            @foreach ($errors->all() as $error)
                <p>• {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="border border-3 border-mavs-navy rounded-xl p-6 max-w-xl text-white">
        {{-- most irritating Bug fix: route uses slug string matching the ->parameters(['news' => 'slug']) in web.php --}}
        <form action="{{ route('news.update', $article->slug) }}" method="POST" class="text-white">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-2 font-medium text-white">Title:</label>
                <input type="text" name="title" value="{{ $article->title }}" class="text-white bg-slate-900 border border-mavs-navy rounded p-2 w-full focus:outline-none" required>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-medium text-white">Image URL:</label>
                <input type="url" name="image" value="{{ $article->image }}" class="text-white bg-slate-900 border border-mavs-navy rounded p-2 w-full focus:outline-none">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-medium text-white">Content:</label>
                <textarea name="content" rows="5" class="text-white bg-slate-900 border border-mavs-navy rounded p-2 w-full focus:outline-none" required>{{ $article->content }}</textarea>
            </div>

            @if($tags->isNotEmpty())
                <div class="mb-4">
                    <label class="block mb-2 font-medium text-white">Tags:</label>
                    <div class="flex flex-wrap gap-3">
                        @foreach($tags as $tag)
                            <label class="flex items-center gap-1 text-sm text-gray-300 cursor-pointer">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                    {{ $article->tags->contains($tag->id) ? 'checked' : '' }}
                                    class="accent-blue-500">
                                {{ $tag->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif
                       
            <button type="submit" class="bg-yellow-500 text-slate-950 px-5 py-2 rounded-full text-sm font-semibold">Update</button>
        </form>
    </div>
@endsection