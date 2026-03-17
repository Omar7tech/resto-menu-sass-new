<?php

namespace App\Helpers;

class ThemeHelper
{
    /**
     * Get selected font and font family for Google Fonts
     */
    public static function getFontSelection($menu): array
    {
        $selectedFont = 'Poppins';
        $fontFamily = 'Poppins';
        
        if ($menu && $menu->have_customized_font) {
            $selectedFont = $menu->font ?? 'Poppins';
            $fontFamily = str_replace(' ', '+', $selectedFont);
        }
        
        return [
            'selectedFont' => $selectedFont,
            'fontFamily' => $fontFamily
        ];
    }
    
    /**
     * Calculate primary color and text contrast
     */
    public static function getPrimaryColorCalc($menu): array
    {
        $primaryColor = $menu->primary_color ?? '#652FF5';
        $hex = str_replace('#', '', $primaryColor);
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        $brightness = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;
        $textColor = $brightness > 128 ? '#000000' : '#FFFFFF';
        
        return [
            'primaryColor' => $primaryColor,
            'textColor' => $textColor
        ];
    }
}
