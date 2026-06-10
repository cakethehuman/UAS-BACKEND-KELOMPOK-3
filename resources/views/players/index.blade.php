@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Players
        </h1>
    </div>
    <section id="players" class="flex justify-center">
        <div class="w-full max-w-6xl overflow-x-auto border border-mavs-navy border-4 shadow-md shadow-mavs-navy rounded-lg my-3 bg-gray-900">
            @if($player->isEmpty())
                <div class="px-6 py-6 text-white">No players</div>
            @else
                <table class="min-w-full border-collapse text-sm text-left text-slate-200">
                    <thead>
                        <tr class="bg-gray-800 border-b border-mavs-navy text-white">
                            <th class="px-4 y-3">Photo</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Team</th>
                            <th class="px-4 py-3">Height</th>
                            <th class="px-4 py-3">Weight</th>
                            <th class="px-4 py-3">Country</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($player as $players)
                            <tr class="border-b border-slate-700 hover:bg-slate-800">
                                <td class="px-4 py-4">
                                    <img src="{{ asset($players->pfp) }}" alt="{{ $players->name }}" class="w-16 h-16 rounded-full object-cover">
                                </td>
                                <td class="px-4 py-4">{{ $players->name }}</td>
                                <td class="px-4 py-4">{{ $players->team }}</td>
                                <td class="px-4 py-4">{{ $players->height }}</td>
                                <td class="px-4 py-4">{{ $players->weight }}</td>
                                <td class="px-4 py-4">{{ $players->country }}</td>
                                <td class="px-4 py-4">
                                    <div class="flex flex-wrap gap-2">
                                        <a class="bg-blue-700 rounded-full w-8 h-8 text-white text-xs flex items-center justify-center" href="{{ route('players.show', $players) }}">🔍</a>
                                        <a class="bg-yellow-500 rounded-full w-8 h-8 text-white text-xs flex items-center justify-center" href="{{ route('players.edit', $players) }}">📝</a>
                                        <form action="{{ route('players.destroy', $players) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-700 rounded-full w-8 h-8 text-white text-xs flex items-center justify-center" type="submit" action='delete'>X</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>

    @can('create', App\Models\Player::class)
    <section id="Edit" class="flex justify-center">
        <div class="flex w-5xl items-center justify-center">
            <a class="text-white border border-2 border-green-600 rounded-full h-7 px-5 bg-green-600" href="{{ route('players.create') }}"> Create New Player</a>
        </div>
    </section>
    @endcan
@endsection
