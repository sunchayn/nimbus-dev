<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            html {
                background-color: oklch(1 0 0);
            }
        </style>

        <title inertia>Nimbus - An integrated, in-browser API client for Laravel with a touch of magic</title>

        <link rel="icon" type="image/png" href="{{ asset('/favicon/favicon-96x96.png') }}" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="{{ asset('/favicon/favicon.svg') }}" />
        <link rel="shortcut icon" href="{{ asset('/favicon/favicon.ico') }}" />
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/favicon/apple-touch-icon.png') }}" />
        <meta name="apple-mobile-web-app-title" content="Nimbus" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/js/app.ts', "resources/js/pages/{$page['component']}.page.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased bg-subtle-background">
        @inertia
    </body>
</html>
