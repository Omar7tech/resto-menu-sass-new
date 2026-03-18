<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if($menu && $menu->dark_mode) data-theme="dark" @endif>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? "Menu Engine Restuarant Menu" }}</title>
    @if ($menu)
        <x-menu.menu-seo />
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-menu.theme-styles/>
    
    <!-- Load Google Font dynamically only if custom font is enabled -->
    @if($menu && $menu->have_customized_font)
        @php
            $fontSelection = \App\Helpers\ThemeHelper::getFontSelection($menu);
            $fontFamily = $fontSelection['fontFamily'];
        @endphp
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family={{ $fontFamily }}:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @endif
    
    <!-- Always load Poppins as fallback -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @livewireStyles
</head>

<body class="font-poppins bg-primary text-primary"   >
    <x-menu.navbar.main1 />
    <main class="max-w-[2000px] mx-auto bg-primary text-primary mt-20">
        {{ $slot }}
    </main>
    <x-menu.footer />
    @livewireScripts
</body>

</html>