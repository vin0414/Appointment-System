<?php

namespace App\Http\Controllers;
use \App\Services\DatabaseService;

class Download extends Controller
{
    public function downloadFile(DatabaseService $backupService)
    {
        $filePath = $backupService->createBackup();
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

}
