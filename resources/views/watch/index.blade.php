@extends('layouts.app')

@section('content')
<div
    class="flex justify-between items-center border border-blue-900 bg-[#0B1528] rounded-full w-full max-w-5xl mx-auto my-5 px-8 py-3 shadow-[0_0_15px_rgba(37,99,235,0.2)]">
    <h1 class="text-white text-xl font-bold tracking-wide">
        <span class="text-red-600">NBA</span> WATCH
    </h1>
    <span class="text-gray-400 text-xs uppercase tracking-widest font-semibold">Official Broadcast</span>
</div>

<section id="watch-section" class="flex justify-center px-4">
    <div class="flex flex-col border-2 border-blue-900 bg-[#0B1528] shadow-lg shadow-blue-950 pb-2">

        <h2 class="text-white text-lg font-extrabold tracking-wider uppercase mt-4 pl-2 mb-6 border-b border-blue-950 pb-2">
            Streaming Channels
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($videos as $video)
                <a href="{{ route('watch.show', $video['video_id']) }}"
                    class="bg-[#070D1A]/60 border border-blue-950 rounded-xl overflow-hidden flex flex-col group hover:border-blue-500 transition duration-300 shadow-md">
                    <div class="h-44 bg-black relative overflow-hidden flex justify-center items-center">
                        <img src="{{ $video['thumbnail'] }}" alt="{{ $video['title'] }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                        <div class="absolute top-3 left-3 flex items-center gap-1">
                            @if($video['is_live'])
                                <span
                                    class="bg-red-600 text-white text-[10px] font-extrabold px-2 py-0.5 rounded flex items-center gap-1 uppercase tracking-wide animate-pulse">
                                    <span class="w-1.5 h-1.5 bg-white rounded-full"></span> LIVE
                                </span>
                            @else
                                <span
                                    class="bg-gray-800/90 text-gray-200 text-[10px] font-extrabold px-2 py-0.5 rounded uppercase tracking-wide border border-gray-700/50">
                                    VIDEO
                                </span>
                            @endif
                        </div>

                        <div
                            class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex justify-center items-center transition duration-300">
                            <div
                                class="bg-blue-600 p-3 rounded-full text-white shadow-lg transform scale-75 group-hover:scale-100 transition duration-300">
                                <svg xmlns="https://www.w3.org/2000/svg" class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 flex-grow bg-[#070D1A]/40 border-t border-blue-950/40">
                        <h3
                            class="text-gray-200 text-sm font-bold leading-snug group-hover:text-blue-400 transition duration-300 line-clamp-2">
                            {{  $video['title'] }}
                        </h3>
                    </div>

                </a>
            @endforeach
        </div>
    </div>
</section>
@endsection