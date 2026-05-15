<?php

namespace App\Console\Commands;

// use Illuminate\Console\Attributes\Description;
// use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Models\ActivityLog;
use Carbon\Carbon;
use App\Helpers\ActivityLogger;

// #[Signature('app:cleanup-activity-logs')]
// #[Description('Command description')]
class CleanupActivityLogs extends Command
{

    // Command name
    protected $signature = 'logs:cleanup';

    // Command description
    protected $description = 'Delete old activity logs from database';
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $days = 1; // delete logs older than 3 days

        // $sele = ActivityLog::where('created_at', '<', Carbon::now()->subDays($days))->ddRawSql();
        // $this->info($sele);
        
        $deleted = ActivityLog::where('created_at', '<', Carbon::now()->subDays($days))->forceDelete();
        $this->info("Deleted {$deleted} activity logs older than {$days} days.");

        ActivityLogger::log(
            'cleanup_activity_logs',
            "Deleted {$deleted} activity logs older than {$days} days."
        );

        return Command::SUCCESS;
    }
}
