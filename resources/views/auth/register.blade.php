@extends('layouts.app')

@section("content")	
<div class="flex items-center justify-center min-h-[calc(100vh-100px)] py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md p-8 space-y-6 bg-gray-800 border-2 border-mavs-navy rounded-xl shadow-lg shadow-mavs-navy/50">
        
        <div>
            <h1 class="text-3xl font-bold text-center text-white">
                Register
            </h1>
            <p class="mt-2 text-sm text-center text-gray-400">
                Create a new account.
            </p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-5">
            @csrf

            <div class="flex flex-col space-y-1">
                <label for="name" class="text-sm font-medium text-gray-200">Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    required
                    value="{{ old('name') }}"
                    placeholder="Enter your name" 
                    class="w-full px-4 py-2 text-white bg-gray-700 border border-gray-600 rounded-lg placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition duration-200"
                >
            </div>
            
            <div class="flex flex-col space-y-1">
                <label for="email" class="text-sm font-medium text-gray-200">Email Address</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    required
                    value="{{ old('email') }}"
                    placeholder="Enter your email" 
                    class="w-full px-4 py-2 text-white bg-gray-700 border border-gray-600 rounded-lg placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition duration-200"
                >
            </div>

            <div class="flex flex-col space-y-1">
                <label for="password" class="text-sm font-medium text-gray-200">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                    placeholder="Enter your password"
                    class="w-full px-4 py-2 text-white bg-gray-700 border border-gray-600 rounded-lg placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition duration-200"
                >
            </div>

            <div class="flex flex-col space-y-1">
                <label for="password_confirmation" class="text-sm font-medium text-gray-200">Confirm Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    required
                    placeholder="Re-enter your password" 
                    class="w-full px-4 py-2 text-white bg-gray-700 border border-gray-600 rounded-lg placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition duration-200"
                >
            </div>

            <div>
                <button 
                    type="submit" 
                    class="w-full px-4 py-2 mt-4 font-semibold text-white transition duration-200 ease-in-out bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                    Register
                </button>
            </div>

            @if ($errors->any())
                <div class="p-4 mt-4 border border-red-500/50 rounded-lg bg-red-500/10">
                    <ul class="space-y-1 list-disc list-inside text-sm text-red-400">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection