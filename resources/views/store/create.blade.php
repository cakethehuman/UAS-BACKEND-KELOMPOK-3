@extends('layouts.app')

@section('content')
<section class="flex justify-center my-10 px-4">
    <div class="w-full max-w-4xl border border-3 border-mavs-navy shadow-lg shadow-mavs-navy rounded-xl overflow-hidden">
        
        <div class="bg-[#00538C] px-8 py-5 border-b-4 border-[C9082A] flex justify-between items-center">
            <h1 class="text-white text-2xl font-black tracking-wide"><span class="text-[C9082A]">NBA</span> STORE PRODUCT</h1>
            <span class="bg-white text-[00538C] text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest">Add Product</span>
        </div>

        <div class="bg-white p-8">
            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-[C9082A] text-red-700 p-4 mb-6" role="alert">
                    <p class="font-bold mb-1">Please check your inputs: </p>
                    <ul class="list-disc pl-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('store.store') }}" method="POST">
                @csrf

                <div class=""grid grid-cols-2 gap-x-8 gap-y-6>
                    <div class="col-span-2 md:col-span-1">
                        <label class="block text-gray800 text-sm font-bold mb-2 uppercase tracking-wide" for="name">Product Name *</label>
                        <input type="text" name="name" id="name" placehorder="e.g., Dallas Mavericks City Edition" class="w-full px-4 py-2 border border-gray-300 rounded foucs:outline-none focus:border-[#00538C] foucs:ring-1 focus:ring-[#00538C] transition bg-gray-50" value="{{ old('name') }}" required>
                    </div>

                    <div class="col-span-2 md:col-span-1">
                        <label class="block text-gray800 text-sm font-bold mb-2 uppercase tracking-wide" for="category">Category *</label>
                        <input type="text" name="category" id="name" placehorder="e.g, Jerseys, Headwear" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-[#00538C] foucs:ring-1 focus:ring-[#00538C] transition bg-gray-50" value="{{ old('category') }}" required>
                    </div>

                    <div class="col-span-2 md:col-span-1">
                        <label class="block text-gray800 text-sm font-bold mb-2 uppercase tracking-wide" for="type">Edition / Type</label>
                        <input type="text" name="type" id="name" placehorder="e.g., Swingman, Authentic" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-[#00538C] foucs:ring-1 focus:ring-[#00538C] transition bg-gray-50" value="{{ old('type') }}"required>
                    </div>

                    <div class="col-span-2 md:col-span-1">
                        <label class="block text-gray800 text-sm font-bold mb-2 uppercase tracking-wide" for="price">Price (Rp) *</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 font-bold">Rp</span>
                            <input type="number" name="price" id="price" placeholder="0" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded foucs:outline-none focus:border-[#00538C] focus:ring-1 foucs:ring-[#00538C] transition bg-gray-50" value="{{ old('price') }}" required>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label class="block text-gray-800 text-sm font-bold mb-2 uppercase tracking-wide" for="description">Product Details</label>
                        <textarea name="description" id="description" rows="3" placeholder="Enter product description here..." class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-[#00538C] focus:ring-1 [#00538C] transition bg-gray-50" value="{{ old('description') }}"></textarea>
        
                    </div>

                    <div class="col-span-2">
                        <label class="block text-gray-800 text-sm font-bold mb-2 uppercase tracking-wide" for="image">Image URL *</label>
                        <input type="url" name="image" id="image" placeholder="https://example.com/image.png" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-[#00538C] focus:ring-1 focus:ring-[#00538C] transition bg-gray-50" value="{{ old('image') }}"required>

                    <div class="col-span-2">
                        <label class="block text-gray-800 text-sm font-bold mb-2 uppercase tracking-wide" for="store_link">Checkout link*</label>
                        <input type="url" name="store_link" id="store_link" placeholder="https://shopee.co.id/..." class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-[#00538C] focus:ring-1 focus:ring-[#00538C] transition bg-gray-50" value="{{ old('store_link') }}" required>
                    </div>
                    
                </div>
                <div class="flex justify-end gap-4 mt-8 pt-6 border-t border-gray=200">
                    <a href="{{ route('store.index') }}" class="px-6 py-2 border border-gray-400 text-gray-600 font-bold rounded hover:bg-gray-100 transition uppercase text-sm tracking-wide flex items-center">
                        Cancel
                    </a>
                    <button type="submit" class="bg-[#00538C] hover:bg-blue-800 text-white font-bold px-8 py-2 rounded transition uppercase text-sm tracking-wide shadow-md">
                        Save Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection