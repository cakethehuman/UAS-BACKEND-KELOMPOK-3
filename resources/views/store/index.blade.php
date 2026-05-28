@extends ('layouts.app')

@section('content')
    <div class="flex justify-between items-center border border-mavs-navy rounded-full w-3xl mx-auto my-5 px-8 py-3">
        <h1 class="text-white text-xl font-bold"><span class="text-red-600">NBA</span> STORE</h1>
        <a class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full text-sm transition"
            href="{{route('store.create') }}">
            + Add a product
        </a>
    </div>

    @if(session('success'))
        <div class="flex justify-center mb-5">
            <div class="bg-green-500 text-white px-4 py-2 rounded-lg w-3xl text-center">
                {{ session('success')}}
            </div>
        </div>
    @endif

    <section id="store" class="flex justify-center">
        <div class="flex justify-center border border-mavs-navy border-3 shadow-md shadow-mavs-navy rounded-lg w-5xl my-5">

            <div class="w-full px-8 py-8">
                @if($store->isEmpty())
                    <p class="text-white text-center">There is no product yet.</p>
                @else
                    <div class="grid grid-cols-4 gap-6">
                        @foreach ($store as $item)
                            <div class="bg-slate-50 border border-3 border-mavs-navy rounded-xl flex flex-col overflow-hidden">

                                <div class="h-48 bg-gray-200 flex justify-center items-center p-2">
                                    <a href="{{$item->store_link }}" target="_blank">
                                        <img src="{{$item->image}}" alt="{{$item->name}}" class="max-h-full object-contain">
                                    </a>
                                </div>

                                <div class="flex flex-col px-4 py-4 flex-grow">
                                    <p class="text-gray-500 text-xs mb-1 uppercase font-semibold">{{$item->type}}</p>
                                    <h1 class="text-slate-900 text-md font-bold mb-2 leading-tight">{{$item->name}}</h1>
                                    <p class="text-red-700 text-lg font-extrabold mt-auto">Rp
                                        {{number_format($item->price, 0, ',', '.')}}
                                    </p>
                                </div>

                                <div class="flex items-center gap-2 px-4 py-3 bg-gray-100 border-t border-gray-300 justify-center">

                                    <a class="bg-orange-500 rounded-full w-7 h-5 text-white text-xs flex items-center justify-center hover:bg-orange-600"
                                        href="{{$item->store_link}}" target="_blank" title="Buy Here">
                                        🛒
                                    </a>

                                    <a class="bg-yellow-500 rounded-full w-7 h-5 text-white text-xs flex items-center justify-center hover:bg-yellow-600"
                                        href="{{route('store.edit', $item)}}" title="Edit Product">
                                        🗒️
                                    </a>

                                    <form action="{{route('store.destroy', $item)}}" method="POST"
                                        onsubmit="return confirm('Are you sure want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="bg-red-700 rounded-full w-7 h-5 text-white text-xs flex items-center justify-center hover:bg-red-800"
                                            type="submit" title="Delete Product">X</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection