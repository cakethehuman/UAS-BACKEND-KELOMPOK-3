@extends('layouts.app')

@section('content')
    <div class="flex border border-mavs-navy rounded-full w-3xl">
        <h1 class="text-white">Profile</h1>
    </div>
    <section id="profile" class="flex justify-center">
        <div class="flex justify-center border border-mavs-navy border-3 shadow-md shadow-mavs-navy rounded-lg w-5xl my-5">
            @if($profil)
                <p class="text-white">Name: {{ $profil->name }}<br>
                                      Email: {{ $profil->email }}</p>
            @endif
        </div>
    </section>
    <section id="Edit">
        <a class="text-white" href="{{route('profile.edit')}}">Edit your profile</a>
        <br><br>
    </section>
    <section id="Create">
        <a class="text-white" href="{{route('profile.create')}}">Add another user</a>
        <br><br>
    </section>
    <section id="Delete">
        <a class="text-white" href="{{route('profile.delete')}}">Delete account</a>
        <br><br>
    </section>
@endsection