<?php

if (!function_exists('public_asset')) {
    function public_asset($path)
    {
        return asset('public/' . ltrim($path, '/'));
    }
}

