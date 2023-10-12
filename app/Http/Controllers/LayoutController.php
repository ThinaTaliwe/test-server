<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layout;

class LayoutController extends Controller
{
    //
    public function selectLayout(Request $request)
    {
        $layouts = Layout::all();
        dd($layouts);

        $user = auth()->user();
        $user->layout_id = $request->layout_id;
        $user->save();

        return redirect('home', compact('layouts'));
    }

    public function show()
    {
        $layouts = Layout::all();
        // dd($layouts);
        return view('home', compact('layouts'));
    }
}
