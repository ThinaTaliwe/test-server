<?php

namespace App\Http\Controllers\Classifications\Customer;

use App\Http\Controllers\Controller;
use App\Models\Classifications\Customer\CustomerClassType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerClassTypeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $user = Auth::user();
        $bu_id = $user->current_bu_id ?? config('bu_ids')[0];

        $customerClassTypes = CustomerClassType::where('bu_id', $bu_id)->get();

        return response()->json($customerClassTypes);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $bu_id = $user->current_bu_id ?? config('bu_ids')[0];

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'nullable|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $customerClassType = new CustomerClassType;
        $customerClassType->name = $request->name;
        $customerClassType->description = $request->description;
        $customerClassType->bu_id = $bu_id;
        $customerClassType->save();

        return response()->json($customerClassType, 201);
    }

}
