@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center">          
        <h1 class="text-white font-bold text-3xl w-70 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-2 shadow-lg shadow-mavs-navy">
            Create News
        </h1>
    </div>

    <section id="form">
        <div class="flex items-center justify-center">
            <div class="flex flex-col border border-3 border-mavs-navy px-2 py-4 w-4xl rounded-xl">
                <form action="{{ route('news.store') }}" method="POST" class="text-white">
                    @csrf
                    
                    <h1>Title : </h1>
                    <input type="text" name="title" class="text-white bg-slate-900 border border-mavs-navy rounded p-1 w-full" required><br><br>

                    <h1>Image URL :</h1>
                    <input type="url" name="image" class="text-white bg-slate-900 border border-mavs-navy rounded p-1 w-full"><br><br>

                    <h1>Content : </h1> 
                    <textarea name="content" rows="5" class="text-white bg-slate-900 border border-mavs-navy rounded p-1 w-full" required></textarea><br><br>

                    @if($tags->isNotEmpty())
                        <h1>Tags :</h1>
                        <div class="flex flex-wrap gap-3 mt-1 mb-4">
                            @foreach($tags as $tag)
                                <label class="flex items-center gap-1 text-sm text-gray-300 cursor-pointer">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                        class="accent-blue-500">
                                    {{ $tag->name }}
                                </label>
                            @endforeach
                        </div>
                    @endif

                    <div class="flex flex-row gap-3">
                        <button type="submit" style="color: #007bff; font-weight: bold;">Publish</button>
                        <p><a href="{{ route('news.index') }}" style="color: #DC143C; font-weight: bold;">Cancel</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection