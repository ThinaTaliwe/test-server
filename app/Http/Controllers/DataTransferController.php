<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mapping;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class DataTransferController extends Controller
{
    public function showTransferForm()
    {
        // $mappings = Mapping::all();

        return view('transfer');
    }




    public function getMappingsForTable($mapping)
    {
        $parts = explode(' -> ', $mapping);
        if (count($parts) !== 2) {
            \Log::error('Invalid mapping format', ['mapping' => $mapping]);
            return response()->json(['error' => 'Invalid mapping format'], 400);
        }
        list($sourceTable, $targetTable) = $parts;
    
        $mappings = DB::connection('1office')->table('column_mappings')
            ->where('source_table', $sourceTable)
            ->where('target_table', $targetTable)
            ->get();
    
        return response()->json($mappings);
    }
    
    


    // Second attempt
    public function getDatabases()
    {
        $databases = DB::connection('1office')->table('column_mappings')->select('source_db')->distinct()->get();

        return response()->json($databases);
    }

public function getTablesForDatabase($database)
{
    $mappings = DB::connection('1office')->table('column_mappings')
        ->where('source_db', $database)
        ->select('source_table', 'target_table')
        ->distinct()
        ->get()
        ->map(function($item) {
            return $item->source_table . ' -> ' . $item->target_table;
        });

    return response()->json($mappings);
}

    

    
// public function runScript(Request $request)
// {
//     $source_database = $request->input('database');
//     $table_pair = $request->input('table');
//     list($source_table, $target_table) = explode(' -> ', $table_pair);

//     $process = new Process(['/bin/python3', '/home/siya/projects/mysql-scripts/transferdata-v6.15.py', $source_database, $source_table, $target_table]);
//     $process->run();

//     $outputLines = explode("\n", $process->getOutput());
//     $outputString = implode("\n", $outputLines);


//     if (!$process->isSuccessful()) {
//         $errors = $outputLines;
//         return view('transfer', ['error' => $errors]);
//     }

//     return view('transfer', ['success' => 'Script ran successfully', 'output' => $outputString]);
// }

public function runScript(Request $request)
{
    $source_database = $request->input('database');
    $table_pair = $request->input('table');
    list($source_table, $target_table) = explode(' -> ', $table_pair);

    $process = new Process(['/bin/python3', '/home/siya/projects/mysql-scripts/transferdata-v7.0.py', $source_database, $source_table, $target_table]);
    $process->run();

    $outputLines = explode("\n", $process->getOutput());
    $errorOutputLines = explode("\n", $process->getErrorOutput());

    $outputString = implode("\n", $outputLines);
    $errorOutputString = implode("\n", $errorOutputLines);

    if (!$process->isSuccessful()) {
        $errors = array_merge($outputLines, $errorOutputLines);
        return view('transfer', ['error' => $errors]);
    }

    return view('transfer', ['success' => 'Script ran successfully', 'output' => $outputString, 'errorOutput' => $errorOutputString]);
}

    

    
}
