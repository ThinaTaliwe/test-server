<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PivotGridController extends Controller
{
    //
    public function pivotGrid()
    {
        // You can pass data to your view here, for example, data to populate the PivotGrid
        $data = []; // Assume $data is fetched or defined here

        return view('pivotGrid', compact('data'));
    }

    public function pivotScroll()
    {
        // You can pass data to your view here, for example, data to populate the PivotGrid
        $data = []; // Assume $data is fetched or defined here

        return view('pivotScroll', compact('data'));
    }

        public function pivotTables()
    {
        // You can pass data to your view here, for example, data to populate the PivotGrid
        $data = []; // Assume $data is fetched or defined here

        return view('pivotTable', compact('data'));
    }
}
