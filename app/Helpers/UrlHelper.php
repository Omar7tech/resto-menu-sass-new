<?php

namespace App\Helpers;

class UrlHelper
{
    /**
     * Check if URL is valid and points to an image based on file extension
     *
     * @param string $url
     * @return bool
     */
    public static function isValidImageUrl(string $url): bool
    {
        // First check if URL is valid
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return false;
        }

        // Get the path component of the URL
        $path = parse_url($url, PHP_URL_PATH);

        // If no path, not an image URL
        if (!$path) {
            return false;
        }

        // Get file extension
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        // Check against common image extensions
        $validImageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp', 'ico', 'bmp'];

        return in_array($extension, $validImageExtensions);
    }

    /**
     * Check if URL is valid and points to a favicon image (ico, png, svg only)
     *
     * @param string $url
     * @return bool
     */
    public static function isValidFaviconUrl(string $url): bool
    {
        // First check if URL is valid
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return false;
        }

        // Get the path component of the URL
        $path = parse_url($url, PHP_URL_PATH);

        // If no path, not an image URL
        if (!$path) {
            return false;
        }

        // Get file extension
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        // Check against favicon-specific extensions
        $validFaviconExtensions = ['ico', 'png', 'svg'];

        return in_array($extension, $validFaviconExtensions);
    }
}
