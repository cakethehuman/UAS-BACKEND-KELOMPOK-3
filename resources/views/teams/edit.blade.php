@extends('layouts.app')

@section('content')
    <h1 class="text-white">Ubah Post</h1>
    <form method="POST" action="{{ route('teams.update', $team) }}">
        @csrf @method('PUT')
            <div class="flex flex-col gap-7">
            <input name="name" class = "border border-mavs-navy bg-white rounded-full pl-4" value="{{ $team->name }}">
            <input name="city" class = "border border-mavs-navy bg-white rounded-full pl-4" value="{{ $team->city }}">
            <input name="abbreviation" class = "border border-mavs-navy bg-white rounded-full pl-4" value="{{ $team->abbreviation }}">
            <input name="logo" class = "border border-mavs-navy bg-white rounded-full pl-4" value="{{ $team->logo }}">
            <input name="conference" class = "border border-mavs-navy bg-white rounded-full pl-4" value="{{ $team->conference }}">
            <input name="division" class = "border border-mavs-navy bg-white rounded-full pl-4" value="{{ $team->division }}">
            <input name="wins" class = "border border-mavs-navy bg-white rounded-full pl-4" type="number" value="{{ $team->wins }}">
            <input name="losses" class = "border border-mavs-navy bg-white rounded-full pl-4" type="number" value="{{ $team->losses }}">
            <input name="arena" class = "border border-mavs-navy bg-white rounded-full pl-4" value="{{ $team->arena }}">
            <button type="submit" class="bg-mavs-navy text-white h-xs rounded-full">Simpan</button>
        </div>
    </form>
@endsection