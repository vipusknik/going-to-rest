<?php

if (!function_exists('base_url')) {
    function base_url($url) {
        $url = preg_replace('/^http(s)?:\/\/(www.)?/', '', trim($url));

        return str_before($url, '/');
    }
}
