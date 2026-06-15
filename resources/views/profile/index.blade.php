@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-70 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-2 shadow-lg shadow-mavs-navy">
            Profile
        </h1>
    </div>
    <section id="profile" class="flex justify-center">
        <div class="flex flex-col justify-center border border-mavs-navy border-3 shadow-md shadow-mavs-navy rounded-lg w-lg my-5 bg-gray-800">
            <div class="flex items-center justify-center">
                @if($profil)
                    <ul class="space-y-3 my-2">
                        <li class="flex items-center justify-between p-3 bg-gray-700 border border-gray-600 rounded-lg w-md hover:border-blue-700">
                            <span class="font-medium text-white">Name : {{ $profil->name }}</span>
                        </li>
                        
                        <li class="flex items-center justify-between p-3 bg-gray-700 border border-gray-600 rounded-lg w-md hover:border-blue-700">
                            <span class="font-medium text-white">Email : {{ $profil->email }}</span>
                        </li>
                    </ul>
                @endif
            </div>
            <div class="flex flex-row pt-4 space-x-3 border-gray-700 mx-2 my-1">
                <a href="{{ route('profile.edit') }}" 
                class="w-full px-3 py-2 font-semibold text-center text-white transition duration-200 ease-in-out bg-yellow-400 rounded-lg hover:bg-yellow-500/90 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                    Edit Profile
                </a>                
                <a href="{{ route('profile.delete') }}" 
                class="w-full px-3 py-2 font-semibold text-center text-white transition duration-200 ease-in-out bg-red-600 rounded-lg hover:bg-red-600/90 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                    Delete Account
                </a>
            </div>
        </div>
@endsection
