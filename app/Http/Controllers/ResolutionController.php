<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResolutionController extends Controller
{
    public function duplicates()
    {
        return view('resolutions.duplicates');
    }

    public function failedInserts()
    {
        return view('resolutions.failedInserts');
    }

    public function unknownFixes()
    {
        return view('resolutions.unknownFixes');
    }
}
