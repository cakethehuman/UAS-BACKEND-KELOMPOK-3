@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center">          
        <h1 class="text-white font-bold text-3xl w-70 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-2 shadow-lg shadow-mavs-navy">
            News Articles
        </h1>
    </div>

    <div class="flex justify-end mb-1">
        <a href="{{ route('tags.index') }}"
            class="text-white text-xs font-semibold px-3 py-1 rounded-full border border-blue-500 bg-mavs-navy hover:opacity-80">
            Tags
        </a>
    </div>

    @can("create", App\Models\Article::class)  
	    <div class="flex items-center justify-center my-5">
		<a class="flex text-white bg-blue-700 px-4 py-1 w-50 h-10 rounded-full font-semibold items-center justify-center" 
		href="{{ route('news.create') }}"> + Add new Article</a>
	    </div>
    @endcan
    @if($articles->isEmpty())
        <p class="text-white">No news available.</p>
    @else
        <div class="flex flex-col gap-4">
            @foreach ($articles as $article)
            <div class="border border-3 border-mavs-navy rounded-xl p-5 max-w-xl text-white">

                <div class="flex items-start justify-between gap-3 mb-1">    
                        <h2 class="text-white text-lg font-bold mb-1">{{ $article->title }}</h2>

                        @if($article->tags->isNotEmpty())
                            <div class="flex flex-wrap justify-end gap-1 shrink-0">

                            @foreach($article->tags as $tag)
                                    <span class="bg-mavs-navy text-white text-xs font-semibold px-2 py-0.5 rounded-full border border-blue-500 whitespace-nowrap">
                                        {{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                </div>

                    <p class="text-gray-400 text-xs mb-3">
                        Published: {{-- $article->published_at ? $article->published_at->diffForHumans() : 'No date' --}}
                    </p>
                    
                    <div class="flex items-center gap-3">
			<a class="text-[#DC143C] font-semibold text-sm hover:underline" href="{{ route('news.show', $article->slug) }}">View</a>
			@can('update', $article) <!-- terhubung dengan policy yang ada -->
				<span class="text-gray-600">|</span>
				<a class="text-yellow-500 font-semibold text-sm hover:underline" href="{{ route('news.edit', $article->slug) }}">Edit</a>
			@endcan
			                        
			@can('delete', $article)
				<span class="text-gray-600">|</span>
				<form action="{{ route('news.destroy', $article->slug) }}" method="POST" class="inline">
				    @csrf
				    @method('DELETE')
				    <button type="submit" class="text-red-500 font-semibold text-sm hover:underline">Delete</button>
				</form>
			@endcan
                    </div>
                    
                </div>
            @endforeach
        </div>

        <div class="mt-6 text-white">
        </div>
    @endif
@endsection
