@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Standings</h1>
        <a href="{{ route('standings.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Standing</a>
    </div>

    @if(session('success'))
        <div class="mb-4 rounded bg-green-100 p-3 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded bg-white p-4 shadow">
        @if($standings->isEmpty())
            <p class="text-gray-600">Belum ada data standing.</p>
        @else
            <table class="min-w-full text-left">
                <thead>
                    <tr class="border-b">
                        <th class="py-2">#</th>
                        <th class="py-2">Tim</th>
                        <th class="py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($standings as $index => $standing)
                        <tr class="border-b">
                            <td class="py-2">{{ $index + 1 }}</td>
                            <td class="py-2">{{ $standing->team?->name ?? '-' }}</td>
                            <td class="py-2">
                                <a href="{{ route('standings.show', $standing) }}" class="mr-2 text-blue-600">Detail</a>
                                <a href="{{ route('standings.edit', $standing) }}" class="mr-2 text-yellow-600">Edit</a>
                                <form action="{{ route('standings.destroy', $standing) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
