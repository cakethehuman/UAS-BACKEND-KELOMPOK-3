<!doctype html>
<html class="h-full bg-slate-900">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="h-full">
    <div class="min-h-full">
    <nav class="bg-gray-800/50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center justify-center relative w-full">

            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                <a href="{{ url('/') }}" aria-current="page" class="px-3 py-2 text-sm 
                font-medium text-gray-300 hover:bg-mavs-navy/70 
                hover:text-white border-2 border-mavs-navy
                rounded-full transition duration-300">Home</a>
                <a href="{{ url('/teams') }}" aria-current="page" class="px-3 py-2 text-sm 
                font-medium text-gray-300 hover:bg-mavs-navy/70 
                hover:text-white border-2 border-mavs-navy
                rounded-full transition duration-300">Teams</a>
                <a href="{{ url('/news') }}" aria-current="page" class="px-3 py-2 text-sm 
                font-medium text-gray-300 hover:bg-mavs-navy/70 
                hover:text-white border-2 border-mavs-navy
                rounded-full transition duration-300">News</a>
                <a href="{{ url('/store') }}" aria-current="page" class="px-3 py-2 text-sm 
                font-medium text-gray-300 hover:bg-mavs-navy/70 
                hover:text-white border-2 border-mavs-navy
                rounded-full transition duration-300">Store</a>
                </div>
            </div>
            </div>
        </div>
        </div>

    </nav>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>
    </div>

  </body>
</html>