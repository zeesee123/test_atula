<?php

if (!function_exists('asset_env')) {
    function asset_env($path)
    {
        return env('APP_ENV') === 'production'
            ? asset('admin/' . ltrim($path, '/'))
            : asset($path);
    }
}