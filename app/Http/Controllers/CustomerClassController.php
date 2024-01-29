<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BU;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Classifications\Customer\CustomerClass;
use App\Models\Classifications\Customer\CustomerClassType;
use App\Models\Classifications\Customer\CustomerClassTypeList;

class CustomerClassController extends Controller
{
    public function getClassTypeList($id)
    {
        $classTypeLists = CustomerClassTypeList::where('customer_class_type_id', $id)->get();

        return response()->json($classTypeLists);
    }

    public function classesForCustomer(Customer $customer)
    {
        // Get all customer classes for the specified customer
        $classes = $customer->customerClasses;

        $classes = CustomerClass::where('customer_id', $customer->id)
                ->with([
                    'customerClassType',
                    'customerClassTypeList'
                ])
                ->get();
    
        // Return the classes in JSON format
        return response()->json($classes);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user(); // Get the current logged in user
        $bu_id = $user->current_bu_id ?? config('bu_ids')[0]; // Get the current business unit id from user or the first one from config
    

        $businessUnits = BU::whereIn('id', config('bu_ids'))->get();
        $customers = Customer::where('bu_id', $bu_id)->with(['customerClassTypeLists', 'customerClasses'])->get();
        $customers = Customer::where('bu_id', $bu_id)
                ->with([
                    'customerClasses', 
                    'customerClasses.customerClassType',
                    'customerClasses.customerClassTypeList'
                ])
                ->get();

        $customerClassTypes = CustomerClassType::where('bu_id', $bu_id)->with('classTypeLists')->get();
        // $customerClassTypeLists = CustomerClassTypeList::where('bu_id', $bu_id)->with('classType')->get();
        //dd($customerClassTypes);

        return view('classification', compact('customers', 'customerClassTypes', 'businessUnits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer_classes.create'); // replace with your actual view path
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        // Validate the request data
        $validated = $request->validate([
            'customerId' => 'required',
            'classTypeId' => 'required',
            'classTypeListId' => 'required',
        ]);
    
        // Create a new Customer Class
        $customerClass = new CustomerClass;
        $customerClass->bu_id = auth()->user()->current_bu_id;
        $customerClass->customer_id = $validated['customerId'];
        $customerClass->customer_class_type_id = $validated['classTypeId'];
        $customerClass->customer_class_type_list_id = $validated['classTypeListId'];
        $customerClass->save();
    
        // Get all customer classes after save
        $customerClasses = CustomerClass::all();
    
        // Format the response in the format required by DataTables
        $response = ['data' => $customerClasses];
    
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classifications\Customer\CustomerClass  $customerClass
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerClass $customerClass)
    {
        return view('customer_classes.show', compact('customerClass')); // replace with your actual view path
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classifications\Customer\CustomerClass  $customerClass
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerClass $customerClass)
    {
        return view('customer_classes.edit', compact('customerClass')); // replace with your actual view path
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classifications\Customer\CustomerClass  $customerClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerClass $customerClass)
    {
        $request->validate([
            'name' => 'required', // validate your fields here
            // ...
        ]);

        $customerClass->name = $request->name; // assign your fields here
        // ...

        $customerClass->save();

        return redirect()->route('customer_classes.index'); // replace with your actual route name
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classifications\Customer\CustomerClass  $customerClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerClass $customerClass)
    {
        $customerClass->delete();
        // return redirect()->route('customer_classes.index'); // replace with your actual route name
        return response()->json(null, 204);
    }
}
