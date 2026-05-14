<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
    public function index()
    {
        $logs = ActivityLog::with('user')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.activity_logs.index', compact('logs'));
    }//
}
