<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class DatabaseService
{
    public function createBackup(): string
    {
        $schema = config('database.connections.mysql.database');
        $timestamp = now()->format('YmdHis');

        // Use Laravel storage path for portability
        $backupDir = storage_path('app/backups');
        if (!is_dir($backupDir)) {
            mkdir($backupDir, 0777, true);
        }

        $backupFileName = $backupDir . "/{$schema}_{$timestamp}.sql";
        $file = fopen($backupFileName, 'w');

        fwrite($file, "-- Backup of {$schema} created on {$timestamp}\n\n");

        // Get all tables
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            $tableName = $table->{'Tables_in_' . $schema};

            // Write CREATE TABLE statement
            $createTableQuery = DB::selectOne("SHOW CREATE TABLE `{$tableName}`");
            fwrite($file, "\n\n-- Creating table {$tableName} --\n");
            fwrite($file, $createTableQuery->{'Create Table'} . ";\n");

            // Write INSERT statements
            fwrite($file, "\n\n-- Inserting data into {$tableName} --\n");

            foreach (DB::table($tableName)->cursor() as $row) {
                $columns = array_keys((array) $row);
                $values = array_map(function ($value) {
                    if (is_null($value)) {
                        return "NULL";
                    }
                    return "'" . addslashes($value) . "'";
                }, (array) $row);

                $insertQuery = "INSERT INTO `{$tableName}` (" . implode(',', $columns) . ") VALUES (" . implode(',', $values) . ");\n";
                fwrite($file, $insertQuery);
            }
        }

        fclose($file);

        return $backupFileName;
    }

}