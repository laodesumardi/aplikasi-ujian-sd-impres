<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @php
            use App\Models\AppSetting;
            $appName = AppSetting::getValue('app_name', 'CBT Admin Sekolah');
        @endphp
        <title>{{ $appName }}</title>

        <!-- Fonts (conditionally load CDN to avoid preview errors) -->
        @if (env('CDN_FONTS', false))
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @endif

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root { --accent: #800e13; --accent-10: rgba(128, 14, 19, 0.1); }
            ::selection { background: var(--accent); color: white; }
            .accent-fill { fill: var(--accent); }
            .accent-stroke { stroke: var(--accent); }
            .accent-bg-10 { background-color: var(--accent-10); }
        </style>
    </head>
    <body class="font-sans antialiased bg-body">
        <div class="min-h-screen bg-body">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
