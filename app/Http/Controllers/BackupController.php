<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backup.index');
    }

    public function backup()
    {
        $tables = DB::select('SHOW TABLES');
        $databaseName = DB::connection()->getDatabaseName();
        $sql = "--\n-- Backup of database '$databaseName'\n--\n\n";

        foreach ($tables as $table) {
            $tableName = $table->{'Tables_in_' . $databaseName};
            $tableSql = DB::selectOne("SHOW CREATE TABLE `$tableName`")->{'Create Table'};
            $tableData = DB::table($tableName)->get()->toArray();

            $sql .= "--\n-- Table structure for table `$tableName`\n--\n$tableSql;\n\n";
            $sql .= "--\n-- Dumping data for table `$tableName`\n--\n";

            foreach ($tableData as $row) {
                $values = [];

                foreach ((array)$row as $value) {
                    $values[] = is_numeric($value) ? $value : "'" . addslashes($value) . "'";
                }

                $sql .= 'INSERT INTO `' . $tableName . '` VALUES (' . implode(',', $values) . ");\n";
            }

            $sql .= "\n";
        }

        $fileName = 'backup-' . date('Y-m-d-H-i-s') . '.sql';
        $filePath = storage_path('app/' . $fileName);

        file_put_contents($filePath, $sql);
        return response()->download($filePath, $fileName)->deleteFileAfterSend(true);
    }
}