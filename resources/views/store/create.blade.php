@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            <span class="text-red-600">NBA</span> STORE
        </h1>
    </div>

    <section class="flex justify-center px-4 my-5">
        <div class="w-full max-w-4xl border-2 border-blue-900 bg-[#0B1528] shadow-lg shadow-blue-950 rounded-2xl p-8">

            @if($errors ->any())
                <div class="bg-red-950/40 border border-red-800 text-red-200 p-4 mb-6 rounded-xl shadow-inner" role="alert">
                    <p class="font-bold mb-1 text-sm"> Please check your inputs:</p>
                    <ul class="list-disc pl-5 text-xs space-y-1 text-red-300/90">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('store.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="'col-span-2 md:col-span-1 flex flex-col">
                        <label class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-2" for="name">
                            Product Name *
                        </label>
                        <input type="text" name="name" id="name" value="{{  old('name') }}" placeholder="e.g., Dallas Maveriks City Edition" required
                            class="w-full bg-[#070D1A]/60 border border-blue-950 rounded-xl px-4 py-3 text-gray-200 placeholder-gray-600 focus:outline-none focus:border-blue-500 focus:ring-1 focusLring-blue-500 transition duration-300 shadow-md">
                    </div>

                    <div class="'col-span-2 md:col-span-1 flex flex-col">
                        <label class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-2" for="name">
                            Category *
                        </label>
                        <input type="text" name="category" id="category" value="{{  old('category') }}" placeholder="e.g., Jerseys, Headwear" required
                            class="w-full bg-[#070D1A]/60 border border-blue-950 rounded-xl px-4 py-3 text-gray-200 placeholder-gray-600 focus:outline-none focus:border-blue-500 focus:ring-1 focusLring-blue-500 transition duration-300 shadow-md">
                    </div>

                    <div class="col-span-2 md:col-span-1 flex flex-col">
                        <label class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-2" for="name">
                            Edition / type *
                        </label>
                        <input type="text" name="type" id="type" value="{{  old('type') }}" placeholder="e.g., Swingman, Authentic" required
                            class="w-full bg-[#070D1A]/60 border border-blue-950 rounded-xl px-4 py-3 text-gray-200 placeholder-gray-600 focus:outline-none focus:border-blue-500 focus:ring-1 focusLring-blue-500 transition duration-300 shadow-md">
                    </div>

                    <div class="col-span-2 md:col-span-1 flex flex-col">
                        <label class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-2" for="price">
                            Price (Rp) *
                        </label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-gray-500 font-bold text-sm select-none">Rp</span>
                            <input type="number" name="price" id="price" value="{{ old('price') }}" placeholder="0" min="0" required
                                class="w-full bg-[#070D1A]/60 border border-blue-950 rounded-xl pl-12 pr-4 py-3 text-gray-200 placeholder-gray-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition duration-300 shadow-md">
                        </div>
                    </div>

                    <div class="col-span-2 flex flex-col">
                        <label class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-2" for="description">
                            Product Details
                        </label>
                        <textarea name="description" id="description" rows="4" placeholder="Enter product description here..."
                            class="w-full bg-[#070D1A]/60 border border-blue-950 rounded-xl px-4 py-3 text-gray-200 placeholder-gray-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition duration-300 shadow-md resize-none">{{ old('description') }}</textarea>
                    </div>

                    <div class="col-span-2 flex flex-col">
                        <label class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-2" for="image">
                            Image URL *
                        </label>
                        <input type="url" name="image" id="image" value="{{ old('image') }}" placeholder="https://example.com/image.png" required
                            class="w-full bg-[#070D1A]/60 border border-blue-950 rounded-xl px-4 py-3 text-gray-200 placeholder-gray-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition duration-300 shadow-md">
                    </div>

                    <div class="col-span-2 flex flex-col">
                        <label class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-2" for="store_link">
                            Checkout link *
                        </label>
                        <input type="url" name="store_link" id="store_link" value="{{ old('store_link') }}" placeholder="https://shopee.co.id/..." required
                            class="w-full bg-[#070D1A]/60 border border-blue-950 rounded-xl px-4 py-3 text-gray-200 placeholder-gray-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition duration-300 shadow-md">
                    </div>

                </div>

                <div class="flex justify-end gap-4 mt-8 pt-6 border-t border-blue-950">
                    <a href="{{ route('store.index') }}"
                        class="px-6 py-2.5 border border-blue-900/60 text-gray-400 font-bold rounded-xl hover:bg-blue-950/40 hover:text-white transition duration-300 uppercase text-xs trackcing-wider flex items-center">
                        cancel
                    </a>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-500 text-white font-bold px-8 py-2.5 rounded-xl transition duration-300 uppercase text-xs tracking-wider shadow-md shadow-blue-950 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                        </svg>
                        Save Product
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection