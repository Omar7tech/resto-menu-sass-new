<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if($menu && $menu->dark_mode) data-theme="dark" @endif>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? "Menu Engine Restuarant Menu" }}</title>
    @if ($menu)
        <x-menu-seo />
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --primary-color:
                {{ $menu->primary_color }}
            ;
            --primary-color-rgb: {{ $menu->primary_color ? str_replace('#', '', $menu->primary_color) : '652FF5' }};
        }
        
        /* Load the selected Google Font */
        @php
            $selectedFont = $menu->font ?? 'Poppins';
            $fontFamily = str_replace(' ', '+', $selectedFont);
        @endphp
        
        /* Calculate if primary color is dark or light and set text color accordingly */
        @php
            $primaryColor = $menu->primary_color ?? '#652FF5';
            $hex = str_replace('#', '', $primaryColor);
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
            $brightness = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;
            $textColor = $brightness > 128 ? '#000000' : '#FFFFFF';
        @endphp
        
        .primary-color-text { color: {{ $textColor }}; }
        .primary-color-border { border-color: {{ $textColor }}; }
        .primary-color-bg { background-color: {{ $primaryColor }}; }
        
        .auth-btn:hover {
            background-color: rgb(var(--bg-primary)) !important;
            color: rgb(var(--text-primary)) !important;
        }
        
        /* Apply the selected font */
        body {
            font-family: '{{ $selectedFont }}', sans-serif !important;
        }
    </style>
    <x-menu-seo />
    <!-- Load Google Font dynamically -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family={{ $fontFamily }}:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!-- Fallback to Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @livewireStyles
</head>

<body class="font-poppins bg-primary text-primary">
    <x-NavBar.main1 />
    <main class="max-w-[1500px] mx-auto bg-primary text-primary mt-20 px-4 sm:px-5 lg:px-6">
        {{ $slot }}
    </main>
    @livewireScripts
</body>

</html>