<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberData;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function membershipGrowthAndRetentionReport()
    {
        // Fetch the data from the database
        $newtotalMemberships = DB::connection('mapping')
            ->table('lededata')
            ->first();

        $newtotalMemberships2 = DB::connection('mapping')
            ->table('lededata')
            ->select('BETDAT', 'BETAAL')
            ->first();
        dd($newtotalMemberships2);

        // Instead of dumping the data, pass it to the view
        // Use 'with' to pass the data as 'membershipData'
        return view('lededata.overview')->with('membershipData', $newtotalMemberships);
    }

    public function profileReport()
    {
        // Fetch the data from the database
        $newtotalMemberships = DB::connection('mapping')
            ->table('lededata')
            ->first();

        // Instead of dumping the data, pass it to the view
        // Use 'with' to pass the data as 'membershipData'
        return view('lededata.settings');
    }

    public function profileReport()
    {
        return view('lededata.settings');
    }
    
    public function profileReport()
    {
        return view('lededata.settings');
    }
    
    public function profileReport()
    {
        return view('lededata.settings');
    }
    
    public function profileReport()
    {
        return view('lededata.settings');
    }
    
    public function profileReport()
    {
        return view('lededata.settings');
    }
    
    public function profileReport()
    {
        return view('lededata.settings');
    }
}
