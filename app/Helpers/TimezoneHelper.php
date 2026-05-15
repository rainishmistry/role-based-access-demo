<?php

use Carbon\Carbon;

if (!function_exists('get_user_timezone')) {
    function get_user_timezone(): string
    {
        // 1. If user logged in and timezone saved in DB
        if (auth()->check() && auth()->user()->timezone) {
            return auth()->user()->timezone;
        }

        // 2. If timezone stored in session
        if (session()->has('timezone')) {
            return session('timezone');
        }

        // 3. Default fallback
        return 'Asia/Kolkata';
    }
}

if (!function_exists('user_time')) {
    function user_time($datetime, string $format = 'd-m-Y h:i A'): string
    {
        if (!$datetime) {
            return '';
        }

        return Carbon::parse($datetime)
            ->timezone(get_user_timezone())
            ->format($format);
    }
}

if (!function_exists('user_time_carbon')) {
    function user_time_carbon($datetime): Carbon
    {
        return Carbon::parse($datetime)->timezone(get_user_timezone());
    }
}