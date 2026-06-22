@extends('layouts.app')

@section('content')
<section class="flex justify-center my-10 px-4">
    <div class="w-full max-w-4xl">
            <div class="border-2 bg-gray-800 border-mavs-navy rounded-full shadow-lg shadow-mavs-navy w-4xl h-15 p-5 my-5 items-center flex justify-between">         
                <h1 class="text-white font-bold text-xl py-2">
                    NBA Watch
                </h1>
       
                <a class="text-white font-bold text-xl py-2" href="{{ route('watch.index') }}">
                    Back
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
                <p class="text-gray-400 text-xs mt-4 leading-relaxed">
                    You are currently watching an official broadcast clip that is embeded to the website.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection