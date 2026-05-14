<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('logs:cleanup')->everyMinute()->appendOutputTo(storage_path('logs/cleanup_activity_logs.log'));


// Run the schedule manually for local development >>>> php artisan schedule:run