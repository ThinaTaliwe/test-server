<?php

namespace App\Http\Controllers;
use App\Models\Person;
use App\Models\UserCustomStyles;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Debugbar\Facade as Debugbar;
use App\Models\LayoutPreference;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // This will fetch the current layout from the configuration file and pass it to the view.
    public function index()
    {
        $layout = config('layout.current');
        // dd($layout);

        $styles = UserCustomStyles::where('users_id', Auth::id())->first();
        //dd($styles);
        // If there's no styles for the user, you could provide some defaults or redirect
        if (!$styles) {
            $styles = UserCustomStyles::where('users_id', 'default')->first(); // if you have default styles
        }
        Debugbar::info($styles);
        
        return view('home', compact('layout', 'styles'));
        // return view('landing', compact('layout'));
    }

    public function index2()
    {
        $layout2 = config('layout.current');
        // dd($layout);
        Debugbar::info($layout2);
        return view('home', compact('layout2'));
        // return view('landing', compact('layout'));
    }

}
