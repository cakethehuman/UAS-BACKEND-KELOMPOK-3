@extends('layouts.app')

@section('content')
    <div class="flex border border-mavs-navy rounded-full w-3xl">
        <h1 class="text-white">Make new</h1>
    </div>
    <section id="form">
        <form method = 'POST' action="{{ route('teams.store') }}">
            @csrf
            <div class="flex flex-col gap-5">
                <input class='border border-mavs-navy bg-white rounded-full' name="name" type="text" required>
                <input class='border border-mavs-navy bg-white rounded-full' name="city" type="text" required>
                <input class='border border-mavs-navy bg-white rounded-full' name="abbreviation" type="text" required>
                <input class='border border-mavs-navy bg-white rounded-full' name="logo" type="text" required>
                <input class='border border-mavs-navy bg-white rounded-full' name="conference" type="text" required>
                <input class='border border-mavs-navy bg-white rounded-full' name="division" type="text" required>
                <input class='border border-mavs-navy bg-white rounded-full' name="wins" type="number" required>
                <input class='border border-mavs-navy bg-white rounded-full' name="losses" type="number" required>
                <input class='border border-mavs-navy bg-white rounded-full' name="arena" type="text" required>
                <button class = 'text-white' type="submit">Simpan</button>
            </div>
        </form>
    </section>
@endsection