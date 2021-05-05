<?php
if (!function_exists('app_path')){
    function app_path($path = ''){
        return base_path('app' . DIRECTORY_SEPARATOR . ltrim($path, '/'));
    }
}
if (!function_exists('config_path')){
    function config_path($path = ''){
        return base_path('config' . DIRECTORY_SEPARATOR . ltrim($path, '/'));
    }
}