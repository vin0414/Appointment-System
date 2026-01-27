<?php

namespace App\Http\Controllers;
use \App\Services\DatabaseService;
use Illuminate\Support\Facades\DB;

class Download extends Controller
{
    public function downloadFile(DatabaseService $backupService)
    {
        $filePath = $backupService->createBackup();
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function downloadRecords()
    {
         $fileName = "applicants.csv";
        $applicants = DB::table('applicants')->get();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['ID', 'First Name', 'M.I.', 'Surname', 'Suffix','Position','Gender','Government ID','ID number','Date Issued','Address','Brgy Captain','Education','Experience','Training'];

        $callback = function() use ($applicants, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($applicants as $row) {
                fputcsv($file, [
                    $row->applicant_id,
                    $row->first_name,
                    $row->middle_name,
                    $row->sur_name,
                    $row->suffix,
                    $row->position,
                    $row->gender,
                    $row->government_id,
                    $row->id_number,
                    $row->date_issued,
                    $row->address,
                    $row->brgy_captain,
                    $row->education,
                    $row->experience,
                    $row->training
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

}