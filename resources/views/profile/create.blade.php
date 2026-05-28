@extends('layouts.app')

@section('content')
    <div class="flex border border-mavs-navy rounded-full w-3xl">
        <h1 class="text-white">Create User</h1>
    </div>
    <section id="form">
        <form method='POST' action="{{route('profile.store')}}">
            @csrf
            <div class="flex flex-col gap-5">
                <input class='border border-mavs-navy bg-white rounded-full' name="name" type="text" required>
                <input class='border border-mavs-navy bg-white rounded-full' name="email" type="text" required>
                <input class='border border-mavs-navy bg-white rounded-full' name="password" type="text" required>
                <button class = 'text-white' type="submit">Simpan</button>
            </div>
        </form>
    </section>
@endsection