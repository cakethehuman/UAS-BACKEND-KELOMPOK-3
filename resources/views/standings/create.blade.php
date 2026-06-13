@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-70 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Add Standings
        </h1>
    </div>
    <section class="flex items-center justify-center">
        <form action="{{ route('standings.store') }}" method="POST" class="max-w-md rounded bg-gray-700 p-6 w-xl">
            @csrf
                <div class="mb-4">
                    <label for="team_id" class="mb-2 block font-medium">Pilih Tim</label>
                    <select name="team_id" id="team_id" class="w-full rounded border p-2" required>
                        <div class="flex justify-center items-center">          
                            <h1 class="text-white font-bold text-3xl w-70 h-15 py-2 text-center 
                            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
                                <option value="">-- Pilih Tim --</option>
                            </h1>
                        </div>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>
            <div class="flex items-center justify-center">
                <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white">Simpan</button>
            </div>
        </form>
    </section>
@endsection
