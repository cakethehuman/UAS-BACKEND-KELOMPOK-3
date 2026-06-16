@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Stats
        </h1>
    </div>
    <section id="stats" class="flex justify-center">
        <div class="w-[1450px] max-w-full overflow-x-auto border-mavs-navy border-4 shadow-md shadow-mavs-navy rounded-lg my-3 bg-gray-900">
                @if($player->isEmpty())
                <div class="px-6 py-6 text-white">No players</div>
            @else
                    <table class="w-full max-w-full border-collapse text-base text-xs text-slate-200">
                    <thead>
                        <tr class="bg-gray-800 border-b border-mavs-navy text-white">
                            <th class="px-1 py-3 text-center"></th>
                            <th class="px-4 py-3 text-center">Name</th>
                            <th class="px-4 py-3 text-center">Team</th>
                            <th class="px-4 py-3 text-center">Age</th>
                            <th class="px-4 py-3 text-center">Points/PPG</th>
                            <th class="px-4 py-3 text-center">Rebounds/PPG</th>
                            <th class="px-4 py-3 text-center">Assists/PPG</th>
                            <th class="px-4 py-3 text-center">Blocks/PPG</th>
                            <th class="px-4 py-3 text-center">Steals/PPG</th>
                            <th class="px-4 py-3 text-center">Turnovers/PPG</th>
                            <th class="px-4 py-3 text-center">Threepoints/PPG</th>
                            <th class="px-4 py-3 text-center">FreeThrows/PPG</th>
                            <th class="px-4 py-3 text-center">Fantasy/PPG</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($player as $players)
                            <tr class="border-b border-slate-700 hover:bg-slate-800">
                                <td class="px-4 py-4 text-center">{{ $loop->iteration }}</td>
                                <td class="px-4 py-4 text-center">{{ $players->name }}</td>
                                <td class="px-4 py-4 text-center">{{ $players->team }}</td>
                                <td class="px-4 py-4 text-center">{{ $players->age }}</td>
                                <td class="px-4 py-4 text-center">{{ $players->points }}</td>
                                <td class="px-4 py-4 text-center">{{ $players->rebounds }}</td>
                                <td class="px-4 py-4 text-center">{{ $players->assists }}</td>
                                <td class="px-4 py-4 text-center">{{ $players->blocks }}</td>
                                <td class="px-4 py-4 text-center">{{ $players->steals }}</td>
                                <td class="px-4 py-4 text-center">{{ $players->turnovers }}</td>
                                <td class="px-4 py-4 text-center">{{ $players->threepoints }}</td>
                                <td class="px-4 py-4 text-center">{{ $players->freethrows }}</td>
                                <td class="px-4 py-4 text-center">{{ $players->fantasy }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>
@endsection
