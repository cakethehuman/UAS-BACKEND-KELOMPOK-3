@extends('layouts.app')

@section('content')
    <section class="flex justify-center my-10 px-4">
        <div class="w-full max-w-4xl">

            <div class="flex justify-center mb-6">
                <h1 class="text-white text-2xl font-bold px-8 py-2 rounded-full border border-blue-500 bg-[#0B1528] shadow-[0_0_15px_rgba(37,99,235,0.4)]">
                    Product Detail
                </h1>
            </div>

            <div class="border-2 border-blue-900 rounded-lg p-8 bg-[#0B1528]">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                    
                    <div class="w-full flex justify-center">
                        <img src="{{ $store->image }}" alt="{{ $store->name }}"
                            class="w-full h-auto max-h-[400px] object-cover rounded-2xl border border-blue-900 shadow-md">
                    </div>

                    <div class="text-white flex flex-col justify-between h-full">
                        <div>
                            <h2 class="text-3xl font-bold mb-1">{{ $store->name }}</h2>
                            <p class="text-xs text-gray-400 uppercase tracking-widest mb-4">
                                {{ $store->category }} {{ $store->type ? '• ' . $store->type : '' }}
                            </p>
                            <p class="text-2xl font-bold text-green-400 mb-6">
                                Rp {{ number_format($store->price, 0, ',', '.') }}
                            </p>

                            <div class="border border-blue-950 bg-[#070D1A] p-4 rounded-2xl min-h-[150px]">
                                <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-2">Description</h3>
                                <p class="text-gray-300 text-sm leading-relaxed">
                                    {{ $store->description ?? 'No Description available.' }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-6">
                            <a href="{{ $store->store_link }}" target="_blank"
                                class="block w-full bg-[#118C3A] hover:bg-green-700 text-white font-bold py-3 rounded-full text-center transition duration-300 shadow-lg uppercase tracking-wider text-sm">
                                Buy here
                            </a>
                        </div>
                    </div>

                </div> 
                <div class="mt-8 pt-4 border-t border-blue-950 text-center">
                    <a href="{{ route('store.index') }}" class="text-sm text-gray-400 hover:text-white transition">
                        Back to Catalog
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection