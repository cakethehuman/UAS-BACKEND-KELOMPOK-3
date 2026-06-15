@extends('layouts.app')

@section('content')
<section class="flex justify-center my-10 px-4">
    <div class="w-full max-w-2xl">
        <div class="flex ustify-center mb-6">
            <h1
                class="text-white text-2xl font-bold px-8 py-2 rounded-full border-blue-500 bg-[#0B1528] shadow-[0_0_15px_rgba(37, 99, 235, 0.4)]">
                Edit Product
            </h1>
        </div>

        <div class="border-2 border-blue-900 rounded-lg p-8 bg-[0B1528]">

            @if($errors->any())
                <div class="bg-red-500 text-white p-3 rounded-lg mb-5 text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('store.update', $store->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-400 mb-2 text-sm" for="name">Product Name (LOCKED)</label>
                        <input type="text" name="name" id="name" value="{{ $store->name }}" readonly
                            class="w-full px-4 py-2 rounded-full bg-gray-700 text-gray-400 cursor-not-allowed focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-gray-400 mb-2 text-sm" for="category">Category (LOCKED)</label>
                        <input type="text" name="category" id="category" value="{{ $store->cateogry }}" readonly
                            class="w-full px-4 py-2 rounded-full bg-gray-700 text-gray-400 cursor-not-allowed focus:outline-none">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-400 mb-2 text-sm" for="type">Edition / Type (LOCKED)</label>
                        <input type="text" name="type" id="type" value="{{ $store->type }}" readonly
                            class="w-full px-4 py-2 rounded-full bg-gray-700 text-gray-400 cursor-not-allowed focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-gray-400 mb-2 text-sm" for="image">Image URL (LOCKED)</label>
                        <input type="text" name="image" id="image" value="{{ $store->image }}" readonly
                            class="w-full px-4 py-2 rounded-full bg-gray-700 text-gray-400 cursor-not-allowed focus:outline-none">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-400 mb-2 text-sm" for="store_link">Shopping Link (LOCKED)</label>
                    <input type="text" name="store_link" id="store_link" value="{{ $store->store_link }}" readonly
                        class="w-full px-4 py-2 rounded-full bg-gray-700 text-gray-400 cursor-not-allowed focus:outline-none">
                </div>
                <hr class="border-blue-900 my-6">

                <div class="mb-4">
                    <label class="block text-white mb-2 text-sm font-bold" for="price">Price (Rp)<span
                            class="text-yellow-400 font-normal text-xs ml-2">*Price changes will be reviewed by
                            Admin</span></label>
                    <input type="number" name="price" id="price" value="{{ $store->price }}" required
                        class="w-full px-4 py-2 rounded-full bg-white text-black focus:outline-none focus:ring-2 focus:ring-yellow-500 border-2 border-yellow-500">
                </div>

                <div class="mb-6">
                    <label class="block text-white mb-2 text-sm font-bold" for="description">Description<span
                            class="text-green-400 font-normal text-xs ml-2">*Free to edit</span></label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full px-4 py-3 rounded-2xl bg-white text-black focus:outline-none focus:ring-2 focus:ring-green-500 border-2 border-green-500">{{ $store->description }}</textarea>
                </div>

                <div class="mt-8">
                    <button type="submit"
                        class="w-full bg-[#118C3A] hover:bg-green-700 text-white py-3 rounded-full transition duration-300 font-bold uppercase tracking-widest shadow-lg">
                        Update Product
                    </button>
                </div>

                <div class="mt-4 text-center">
                    <a href="{{ route('store.index') }}"
                        class="text-sm text-gray-400 hover:text-white transition">Cancel & Back to Store Page</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection