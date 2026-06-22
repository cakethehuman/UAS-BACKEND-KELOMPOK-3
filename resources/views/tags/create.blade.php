@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center">          
        <h1 class="text-white font-bold text-3xl w-70 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-2 shadow-lg shadow-mavs-navy">
            Create Tag
        </h1>
    </div>

    <section id="form">
        <div class="flex items-center justify-center mt-6">
            <div class="flex flex-col border border-3 border-mavs-navy px-6 py-6 w-lg rounded-xl">

                @if ($errors->any())
                    <div class="text-red-500 mb-4">
                        @foreach ($errors->all() as $error)
                            <p>• {{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('tags.store') }}" method="POST" class="text-white">
                    @csrf
                    
                    <h1 class="mb-1">Tag Name :</h1>
                    <input type="text" name="name" value="{{ old('name') }}" 
                        class="text-white bg-slate-900 border border-mavs-navy rounded p-2 w-full" required>

                    <div class="flex flex-row gap-3 mt-4">
                        <button type="submit" style="color: #007bff; font-weight: bold;">Save</button>
                        <a href="{{ route('tags.index') }}" style="color: #DC143C; font-weight: bold;">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection