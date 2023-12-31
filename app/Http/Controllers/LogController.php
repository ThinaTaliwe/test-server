<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function show()
    {
        $logs = $this->getLogs();
        return view('logs.show', compact('logs'));
    }

    private function getLogs(): string
    {
        $logPath = storage_path('logs/laravel.log');
        if (File::exists($logPath)) {
            return File::get($logPath);
        }

        return 'Log file does not exist.';
    }

}
