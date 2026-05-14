<?php

namespace App\Helpers;

use App\Models\ActivityLog;

class ActivityLogger
{
    public static function log($action, $description = null)
    {
        ActivityLog::create([
            'user_id'     => auth()->check() ? auth()->id() : null,
            'action'      => $action,
            'description' => $description,
            'ip_address'  => request()->ip(),
            'user_agent'  => request()->userAgent(),
        ]);
    }
}