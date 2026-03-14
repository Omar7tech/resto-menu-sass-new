<?php

namespace App\Helpers;

class ColorHelper
{
    private $hexColor;
    private $r;
    private $g;
    private $b;
    private $brightness;

    public function __construct($hexColor)
    {
        $this->hexColor = $hexColor;
        $hex = str_replace('#', '', $hexColor);
        $this->r = hexdec(substr($hex, 0, 2));
        $this->g = hexdec(substr($hex, 2, 2));
        $this->b = hexdec(substr($hex, 4, 2));
        $this->brightness = (($this->r * 299) + ($this->g * 587) + ($this->b * 114)) / 1000;
    }

    public function getContrastColor()
    {
        return $this->brightness > 128 ? '#000000' : '#FFFFFF';
    }
}
