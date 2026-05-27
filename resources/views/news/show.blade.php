@extends('layouts.app')

@section('content')
    <p class="mb-4"><a href="{{ route('news.index') }}" style="color: #DC143C; font-weight: bold;">← Back to News</a></p>

    <div class="border border-3 border-mavs-navy rounded-xl p-6 max-w-3xl text-white">
        
        <h1 class="text-white text-3xl font-bold mb-2">{{ $article->title }}</h1>
        
        <p class="text-gray-400 text-sm mb-4">
            Published: {{ $article->published_at ? $article->published_at->diffForHumans() : 'No date' }}
        </p>

        @if($article->image)
            <div class="mb-6">
                <img src="{{ $article->image }}" alt="Article Image" class="rounded-lg max-w-full h-auto border border-mavs-navy" style="max-height: 400px;">
            </div>
        @endif

        <p class="text-white leading-relaxed" style="white-space: pre-line;">{{ $article->content }}</p>
        
    </div>
@endsection