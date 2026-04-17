<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>AeroSense - Crab Edition</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 min-h-screen font-sans">
    {{-- Navigation --}}
    <nav class="bg-teal-700 text-white shadow-md">
        <div class="max-w-xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="/" class="text-lg font-bold tracking-tight">🦀 AeroSense</a>
            <div class="flex gap-4 text-sm font-medium">
                <a href="{{ route('input') }}" class="hover:text-teal-200 transition {{ request()->routeIs('input') ? 'text-teal-200 underline underline-offset-4' : '' }}">Input</a>
                <a href="{{ route('history') }}" class="hover:text-teal-200 transition {{ request()->routeIs('history') ? 'text-teal-200 underline underline-offset-4' : '' }}">Riwayat</a>
            </div>
        </div>
    </nav>

    <main class="max-w-xl mx-auto px-4 py-6">
        @yield('content')
    </main>
</body>
</html>
