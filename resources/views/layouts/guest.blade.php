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
    <body class="font-sans text-gray-900 antialiased bg-body overflow-y-auto">
        <div class="min-h-screen flex flex-col justify-center items-center bg-body py-4 sm:py-6 px-4 sm:px-6">
            <div class="mb-4 sm:mb-6 -mt-12 sm:mt-0 flex-shrink-0">
                <a href="/" class="block">
                    <x-application-logo class="w-16 h-16 sm:w-20 sm:h-20 fill-current text-primary mx-auto" />
                </a>
            </div>

            <div class="w-full max-w-sm sm:max-w-md px-4 sm:px-8 py-4 sm:py-6 bg-white shadow-lg rounded-xl border-t-4 border-primary flex-shrink-0 mb-4 sm:mb-6">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
