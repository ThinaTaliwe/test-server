<?php

namespace App\Http\Controllers;

use App\Models\MembershipHasAddress;
use Illuminate\Http\Request;

class MembershipHasAddressController extends Controller
{
    public function index()
    {
        $addresses = MembershipHasAddress::all();
        // dd($addresses);
        return response()->json($addresses);
    }
}
