@extends('layouts.app')

@section('content')
    <form action="{{ route('seats.destroy', $seat) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class='bg-red-700 rounded-full w-7 h-5 text-white text-xs 
        flex items-center justify-center' type="submit">X</button>
    </form>
@endsection