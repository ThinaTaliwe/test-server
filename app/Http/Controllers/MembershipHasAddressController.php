<?php

namespace App\Http\Controllers;

use App\Models\MembershipHasAddress;
use Illuminate\Http\Request;

class MembershipHasAddressController extends Controller
{
    public function index()
    {
        $addresses = MembershipHasAddress::all();
        return response()->json($addresses);
    }

    public function delete($itemId)
    {
        try {
            console . log('Hello');
            $address = MembershipHasAddress::findOrFail($itemId); // This throws an exception if no model found
            $address->delete();
            return response()->json(['message' => 'Record deleted successfully'], 200);
        } catch (\Exception $e) {
            // Log error for further analysis
            \Log::error('Failed to delete record: ' . $e->getMessage());
            return response()->json(['message' => 'Server error occurred'], 500);
        }
    }
}
