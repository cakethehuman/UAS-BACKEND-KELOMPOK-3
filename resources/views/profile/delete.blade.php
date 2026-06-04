@extends('layouts.app')

@section('content')
    <div class="flex border border-mavs-navy rounded-full w-3xl">
        <h1 class="text-white">Delete Account</h1>
    </div>
    <section id="form">
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')
                <div class="flex flex-col gap-5">
                    <input type="text" name="name" placeholder="Confirm your name" class='border border-mavs-navy bg-white rounded-full'>
                    @error('namedest')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <input type="email" name="email" placeholder="Confirm your email" class='border border-mavs-navy bg-white rounded-full'>
                    @error('emaildest')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <input type="password" name="password" placeholder="Confirm your password" class='border border-mavs-navy bg-white rounded-full'>
                    @error('passworddest')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <button type="submit" class='text-white'>Delete Account</button>   
            </div>
        </form>
    </section>
@endsection