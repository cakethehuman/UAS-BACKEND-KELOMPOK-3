@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="mb-4 text-2xl font-bold">Tambah Standing</h1>

    <form action="{{ route('standings.store') }}" method="POST" class="max-w-md rounded bg-white p-6 shadow">
        @csrf

        <div class="mb-4">
            <label for="team_id" class="mb-2 block font-medium">Pilih Tim</label>
            <select name="team_id" id="team_id" class="w-full rounded border p-2" required>
                <option value="">-- Pilih Tim --</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white">Simpan</button>
        <a href="{{ route('standings.index') }}" class="ml-2 text-gray-600">Kembali</a>
    </form>
</div>
@endsection
