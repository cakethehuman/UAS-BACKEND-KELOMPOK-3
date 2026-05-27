@extends('layouts.app')

@section('content')
    <h1 class="text-white">Create Article</h1>
    <p><a href="{{ route('news.index') }}" style="color: #DC143C; font-weight: bold;">Cancel</a></p>

    <form action="{{ route('news.store') }}" method="POST" class="text-white">
        @csrf
        
        Title: <br>
        <input type="text" name="title" class="text-white bg-slate-900 border border-mavs-navy rounded p-1 w-full max-w-md" required><br><br>

        Image URL: <br>
        <input type="url" name="image" class="text-white bg-slate-900 border border-mavs-navy rounded p-1 w-full max-w-md"><br><br>

        Content: <br>
        <textarea name="content" rows="5" class="text-white bg-slate-900 border border-mavs-navy rounded p-1 w-full max-w-md" required></textarea><br><br>

        <button type="submit" style="color: #007bff; font-weight: bold;">Publish</button>
    </form>
@endsection