@php
    $fontSelection = \App\Helpers\ThemeHelper::getFontSelection($menu);
    $colorCalc = \App\Helpers\ThemeHelper::getPrimaryColorCalc($menu);
    $selectedFont = $fontSelection['selectedFont'];
    $fontFamily = $fontSelection['fontFamily'];
    $primaryColor = $colorCalc['primaryColor'];
    $textColor = $colorCalc['textColor'];
@endphp

<style>
    :root {
        --primary-color:
            {{ $menu->primary_color }}
        ;
        --primary-color-rgb:
            {{ $menu->primary_color ? str_replace('#', '', $menu->primary_color) : '652FF5' }}
        ;
    }

    .primary-color-text {
        color:
            {{ $textColor }}
        ;
    }

    .primary-color-border {
        border-color:
            {{ $textColor }}
        ;
    }

    .primary-color-bg {
        background-color:
            {{ $primaryColor }}
        ;
    }

    .auth-btn:hover {
        background-color: rgb(var(--bg-primary)) !important;
        color: rgb(var(--text-primary)) !important;
    }

    .category-badge {
        @if($menu && $menu->is_category_badge_follow_font)
            font-family: '{{ $selectedFont }}', sans-serif !important;
        @else font-family: 'Poppins', sans-serif !important;
        @endif
    }

    @if($menu && !$menu->is_category_badge_follow_primary_color)
        .category-badge-custom-color {
            background-color:
                {{ $menu->category_badge_color ?? '#652FF5' }}
            ;
            color:
                {{ $menu->category_badge_color ? (new \App\Helpers\ColorHelper($menu->category_badge_color))->getContrastColor() : '#FFFFFF' }}
            ;
        }

    @endif

    /* Apply the selected font */
    body {
        font-family: '{{ $selectedFont }}', sans-serif !important;
    }

    .category-scroll-container {
        overflow-x: auto;
        overflow-y: hidden;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        /* Firefox */
        -ms-overflow-style: none;
        /* IE/Edge */
        cursor: grab;
        user-select: none;
        /* Prevent text selection while dragging */
    }

    .category-scroll-container::-webkit-scrollbar {
        display: none;
        /* Chrome, Safari, Opera */
    }

    .category-scroll-container.cursor-grabbing {
        cursor: grabbing;
    }

    .category-scroll-container .flex {
        scroll-snap-type: x mandatory;
    }

    .category-scroll-container .flex>* {
        scroll-snap-align: start;
        flex-shrink: 0;
    }
</style>