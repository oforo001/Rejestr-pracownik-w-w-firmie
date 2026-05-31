<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Rejestr pracowników') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @include('partials.ui-styles')
    </head>
    <body class="ui-body">
        <div class="ui-auth-shell">
            <div class="ui-auth-card">
                <div class="ui-brand-row">
                    <div class="ui-brand-copy">
                        <strong>{{ config('app.name', 'Rejestr pracowników') }}</strong>
                        <span>System kadrowy</span>
                    </div>
                </div>

                {{ $slot }}
            </div>
        </div>
    </body>
</html>
