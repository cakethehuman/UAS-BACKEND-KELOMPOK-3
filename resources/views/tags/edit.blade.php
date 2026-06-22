@extends('layouts.app')

@section('content')
    <div class="flex border border-mavs-navy rounded-full w-3xl px-6 py-2 mb-4">
        <h1 class="text-white text-xl">Edit Tag</h1>
    </div>

    <p class="mb-4"><a href="{{ route('tags.index') }}" style="color: #DC143C; font-weight: bold;">Cancel</a></p>

    @if ($errors->any())
        <div class="text-red-500 mb-4">
            @foreach ($errors->all() as $error)
                <p>• {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="border border-3 border-mavs-navy rounded-xl p-6 max-w-md text-white">
        <form action="{{ route('tags.update', $tag->id) }}" method="POST" class="text-white">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-2 font-medium text-white">Tag Name:</label>
                <input type="text" name="name" value="{{ old('name', $tag->name) }}" 
                    class="text-white bg-slate-900 border border-mavs-navy rounded p-2 w-full focus:outline-none" required>
            </div>

            <button type="submit" class="bg-yellow-500 text-slate-950 px-5 py-2 rounded-full text-sm font-semibold">Update</button>
        </form>
    </div>
@endsection