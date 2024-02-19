<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResolutionDuplicate;
use App\Models\ResolutionFailedInsert;
use App\Models\ResolutionUnknownFix;

class ResolutionController extends Controller
{
    public function duplicates()
    {
        $duplicates = ResolutionDuplicate::all();     //return all the data in the database
        //$duplicates = ResolutionDuplicate::take(20)->get();
        return view('resolutions.duplicates', compact('duplicates'));
    }

    public function failedInserts()
    {
        $failedInserts = ResolutionFailedInsert::all();
        //$failedInserts = ResolutionFailedInsert::take(10)->get();
        return view('resolutions.failedInserts', compact('failedInserts'));
    }

    public function unknownFixes()
    {  
        $unknownFixes = ResolutionFailedInsert::all();
        //$unknownFixes = ResolutionFailedInsert::take(10)->get();
        return view('resolutions.unknownFixes', compact('unknownFixes'));
    }

        public function resolutionHub()
    {  
        return view('resolutions.resolutionhub');
    }
}
