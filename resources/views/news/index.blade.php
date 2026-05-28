@extends('layouts.app')

@section('content')
    <div class="flex border border-mavs-navy rounded-full w-3xl px-6 py-2 mb-4">
        <h1 class="text-white text-xl">News Articles</h1>
    </div>

    @if(session('success'))
        <p class="text-green-500 mb-4">{{ session('success') }}</p>
    @endif

    <div class="mb-6">
	@can('create', App\Models\Team::class) <!-- terhubung dengan policy yang ada -->
		<a class="text-white bg-blue-700 px-4 py-2 rounded-full text-sm font-semibold" href="{{ route('news.create') }}">Create New Article</a>
	@endcan

    </div>

    @if($articles->isEmpty())
        <p class="text-white">No news available.</p>
    @else
        <div class="flex flex-col gap-4">
            @foreach ($articles as $article)
                <div class="border border-3 border-mavs-navy rounded-xl p-5 max-w-xl text-white">
                    
                    <h2 class="text-white text-lg font-bold mb-1">{{ $article->title }}</h2>
                    
                    <p class="text-gray-400 text-xs mb-3">
                        Published: {{-- $article->published_at ? $article->published_at->diffForHumans() : 'No date' --}}
                    </p>
                    
                    <div class="flex items-center gap-3">

                        <a class="text-[#DC143C] font-semibold text-sm hover:underline" href="{{ route('news.show', $article->slug) }}">View</a>
                        <span class="text-gray-600">|</span>
                        
                        <a class="text-yellow-500 font-semibold text-sm hover:underline" href="{{ route('news.edit', $article->slug) }}">Edit</a>
                        <span class="text-gray-600">|</span>
                        
                        {{-- Bug fix: no more JavaScrip confirm --}}
                        <form action="{{ route('news.destroy', $article->slug) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 font-semibold text-sm hover:underline">Delete</button>
                        </form>
                    </div>
                    
                </div>
            @endforeach
        </div>

        <div class="mt-6 text-white">
        </div>
    @endif
@endsection
