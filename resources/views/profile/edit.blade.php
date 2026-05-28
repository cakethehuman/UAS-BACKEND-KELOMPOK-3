@extends('layouts.app')

@section('content')
    <div class="flex border border-mavs-navy rounded-full w-3xl">
        <h1 class="text-white">Edit Your Profile</h1>
    </div>
    <div class="flex flex-col gap-10 mt-5">
        <form method='POST' action="{{route('profile.updateName')}}">
            @csrf @method('PATCH')
            <div class="flex flex-col gap-3">
                    <input type="text" name="name" value="{{$profil->name}}" placeholder="New Name" class="border border-mavs-navy bg-white rounded-full pl-4">
                    <input type="password" name="password" placeholder="Password" class="border border-mavs-navy bg-white rounded-full pl-4">
                    <button type="submit" class="border border-mavs-navy bg-white rounded-full pl-4">Change Name</button>
                    @error('namePassword')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
            </div>
        </form>

        <form method='POST' action="{{route('profile.updateEmail')}}">
            @csrf @method('PATCH')
            <div class="flex flex-col gap-3">
                    <input type="text" name="email" value="{{$profil->email}}" placeholder="New Email" class="border border-mavs-navy bg-white rounded-full pl-4">
                    <input type="password" name="password" placeholder="Password" class="border border-mavs-navy bg-white rounded-full pl-4">
                    <button type="submit" class="border border-mavs-navy bg-white rounded-full pl-4">Change Email</button>
                    @error('emailPassword')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
            </div>
        </form>

        <form method='POST' action="{{route('profile.updatePass')}}">
            @csrf @method('PATCH')
            <div class="flex flex-col gap-3">
                    <input type="password" name="currPass" placeholder="Current Password" class="border border-mavs-navy bg-white rounded-full pl-4">
                    <input type="password" name="newPass" placeholder="New Password" class="border border-mavs-navy bg-white rounded-full pl-4">
                    <button type="submit" class="border border-mavs-navy bg-white rounded-full pl-4">Change Password</button>
                    @error('currPass')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    @error('newPass')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
            </div>
        </form> 

        <form action="{{ route('profile.destroy', $profil) }}" method="POST">
            @csrf
            @method('DELETE')

            <button class='bg-red-700 rounded-full w-7 h-5 text-white text-xs 
            flex items-center justify-center' type="submit">X</button>
        </form>
    </div>
@endsection