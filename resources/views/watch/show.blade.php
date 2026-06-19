@extends('layouts.app')

@section('content')
<section class="flex justify-center my-10 px-4">
    <div class="w-full max-w-4xl">

        <div class="flex justify-between items-center mb-6">
            <h1
                class="text-white text-xl font-bold px-6 py-2 rounded-full border border-blue-500 bg-[#0B1528] shadow-[0_0_15px_rgba(37,99,234,0.4)]">
                <span class="text-red-600">NB4</span> PLAYER
            </h1>
            <a href="{{ route('watch.index') }}"
                class="text-sm text-gray-400 hover:text-white transition flex items center gap-1">
                Back to Video List
            </a>
        </div>
        <div class="border-2 border-blue-900 rounded-2xl p-6 bg-[#0B1528] shadow-lg shadow-mavs-navy">

            <div class="aspect-video w-full rounded-xl overflow-hidden border border-blue-950 bg-black">
                <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $id }}?autoplay=1&mute=1"
                    title="Video Player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen>
                </iframe>
            </div>

            <div class="mt-6 text-white">
                <span
                    class="bg-red-600/20 text-red-400 text-[10px] font-black px-2.5 py-1 rounded-full uppercase tracking-wider border border-red-600/30">
                    Official Content
                </span>
                <p class="text-gray-400 text-xs mt-4 leading-relaxed">
                    You are currently watching an official broadcast clip via NBA Project Cinema. Youtube controls and
                    title are rendered automatically inside the embed window.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection