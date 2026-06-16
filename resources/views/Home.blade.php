@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-lg p-7 space-y-6 bg-gray-800 border-2 border-mavs-navy rounded-xl shadow-lg shadow-mavs-navy/50">
        
        <div class="text-center border-gray-700">
            <h1 class="text-3xl font-bold text-blue-400">
                Kelompok 3
            </h1>
        </div>
        <ul class="space-y-3">
            <li class="flex items-center justify-between p-3 bg-gray-700 border border-gray-600 rounded-lg">
                <span class="font-medium text-white">Leonardo Firnandius</span>
                <span class="text-sm font-mono text-blue-400">535250001</span>
            </li>
            
            <li class="flex items-center justify-between p-3 bg-gray-700 border border-gray-600 rounded-lg">
                <span class="font-medium text-white">Malvin Grico Gunawan</span>
                <span class="text-sm font-mono text-blue-400">535250009</span>
            </li>
            
            <li class="flex items-center justify-between p-3 bg-gray-700 border border-gray-600 rounded-lg">
                <span class="font-medium text-white">Willson Hadinata Putra</span>
                <span class="text-sm font-mono text-blue-400">535250013</span>
            </li>
            
            <li class="flex items-center justify-between p-3 bg-gray-700 border border-gray-600 rounded-lg">
                <span class="font-medium text-white">Chandra</span>
                <span class="text-sm font-mono text-blue-400">535250019</span>
            </li>
            
            <li class="flex items-center justify-between p-3 bg-gray-700 border border-gray-600 rounded-lg">
                <span class="font-medium text-white">Nicholas Tannaydi</span>
                <span class="text-sm font-mono text-blue-400">535250043</span>
            </li>
            
            <li class="flex items-center justify-between p-3 bg-gray-700 border border-gray-600 rounded-lg">
                <span class="font-medium text-white">Felix Lin</span>
                <span class="text-sm font-mono text-blue-400">535250044</span>
            </li>
        </ul>
    </div>
</div>
<section>
    <livewire:counter />
</section>
@endsection