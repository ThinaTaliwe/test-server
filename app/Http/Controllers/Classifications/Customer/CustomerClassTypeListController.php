<?php

namespace App\Http\Controllers\Classifications\Customer;

use App\Http\Controllers\Controller;
use App\Models\Classifications\Customer\CustomerClassType;
use App\Models\Classifications\Customer\CustomerClassTypeList;
use Illuminate\Http\Request;

class CustomerClassTypeListController extends Controller
{
    public function getCustomerClassTypes() {
        $user = auth()->user(); // Get the current logged in user
        $bu_id = $user->current_bu_id ?? config('bu_ids')[0]; // Get the current business unit id from user or the first one from config

        $customerClassTypes = CustomerClassType::where('bu_id', $bu_id)->get();

        return response()->json($customerClassTypes);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'customer_class_type_id' => 'required|exists:customer_class_type,id'
        ]);

        try {
            $user = auth()->user(); // Get the current logged in user
            $bu_id = $user->current_bu_id ?? config('bu_ids')[0]; // Get the current business unit id from user or the first one from config

            $customerClassTypeList = new CustomerClassTypeList();
            $customerClassTypeList->name = $request->name;
            $customerClassTypeList->bu_id = $bu_id;
            $customerClassTypeList->customer_class_type_id = $request->customer_class_type_id;
            $customerClassTypeList->save();

            return response()->json($customerClassTypeList, 201); // 201 Created

        } catch (\Exception $e) {
            if ($e instanceof \Illuminate\Database\QueryException) {
                return response()->json(['error' => 'Customer Class Type List already exists.'], 409); // 409 Conflict
            }
            return response()->json(['error' => 'Failed to create Customer Class Type List.'], 500); // 500 Internal Server Error
        }
    }
}
