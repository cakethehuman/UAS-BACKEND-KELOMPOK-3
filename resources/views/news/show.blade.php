@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <a href="{{ route('news.index') }}" 
        class="inline-block text-white text-sm font-bold py-2 px-4 rounded hover:opacity-90 transition duration-200" 
        style="background-color: #DC143C;">
            ← Back to News
        </a>
    </div>


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

        <div class="mt-8 max-w-3xl text-white">
 
        <h2 class="text-xl font-bold mb-4">Comments ({{ $article->comments->count() }})</h2>
 
        {{-- Add new comment form --}}
        <form action="{{ route('comments.store') }}" method="POST" class="bg-gray-900 border border-mavs-navy rounded-lg p-4 mb-6">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
 
            {{-- w-full makes the textarea stretch to the full width of its parent box --}}
            <textarea name="body" rows="3"
                class="w-full p-3 rounded bg-gray-800 text-white border border-mavs-navy placeholder-gray-500 text-sm focus:outline-none"
                placeholder="Comment..." required></textarea>
 
            <div class="flex justify-end mt-3">
                <button type="submit"
                    class="text-white text-sm font-bold py-1.5 px-4 rounded hover:opacity-90 transition duration-200"
                    style="background-color: #0291f7;">
                    Submit
                </button>
            </div>
        </form>
 
        <div class="space-y-3">
            @forelse($article->comments as $comment)
                <div class="bg-gray-900 border border-mavs-navy rounded-lg p-4 text-sm">
 
                    {{-- View mode: shows the comment text + edit/delete buttons --}}
                    <div id="view-{{ $comment->id }}">
                        <p class="text-gray-200">{{ $comment->body }}</p>
 
                        <div class="flex justify-end items-center space-x-4 text-xs mt-3 pt-2 border-t border-gray-800">
                                                        <!-- Edit button toggles the edit form, yes this is blaring red, ignore it -->
                            <button onclick="toggleEdit({{ $comment->id }})"
                                class="text-gray-400 hover:text-white transition duration-200">
                                Edit
                            </button>
 
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                onsubmit="return confirm('You sure you want to delete this comment?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-semibold hover:opacity-80 transition duration-200"
                                    style="color: #a41834; background: none; border: none; padding: 0;">
                                    Delete
                                </button>
                            </form>
 
                        </div>
                    </div>
 
                    {{-- Edit mode: hidden by default, shown when Edit is clicked --}}
                    <div id="edit-{{ $comment->id }}" style="display: none;">
                        <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
 
                            {{-- w-full makes the edit textarea the same width as the comment box --}}
                            <textarea name="body" rows="3"
                                class="w-full p-2 rounded bg-gray-800 text-white border border-mavs-navy text-sm focus:outline-none">{{ $comment->body }}</textarea>
 
                            <div class="flex justify-end gap-2 mt-2">
                                                                    <!-- Edit button toggles the edit form, yes this is blaring red, ignore it -->
                                <button type="button" onclick="toggleEdit({{ $comment->id }})"
                                    class="text-gray-400 text-xs hover:text-white transition duration-200">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="text-white text-xs font-bold py-1 px-3 rounded hover:opacity-90 transition duration-200"
                                    style="background-color: #0291f7;">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
 
                </div>
            @empty
                <p class="text-gray-500">No comments yet.</p>
            @endforelse
        </div>
 
    </div>
 
    <script>
        function toggleEdit(id) {
            var view = document.getElementById('view-' + id);
            var edit = document.getElementById('edit-' + id);
 
            if (edit.style.display === 'none') {
                view.style.display = 'none';
                edit.style.display = 'block';
            } else {
                view.style.display = 'block';
                edit.style.display = 'none';
            }
        }
    </script>
@endsection