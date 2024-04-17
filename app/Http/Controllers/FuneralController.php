<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
use App\Models\Dependent;
use App\Models\Person;
use App\Models\PersonHasPerson;

use App\Actions\StoreAddress;
use App\Models\MembershipAddress;
use App\Models\Address;
use App\Models\AddressType;
use App\Models\PersonHasFuneral;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FuneralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberships = Membership::with(['person.dependant.secondaryPerson', 'person.dependant.relationshipType', 'person'])->get();

        return view('funerals.index', compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch the 'Church' address type ID
        $churchTypeId = AddressType::where('name', 'Church')->first()->id ?? null;

        // Fetch the 'Graveyard' address type ID
        $graveyardTypeId = AddressType::where('name', 'Graveyard')->first()->id ?? null;

        // Fetch all addresses with the 'Church' type ID
        $churches = Address::where('adress_type_id', $churchTypeId)->get();
        
        // Fetch all addresses with the 'Church' type ID
        $graveyards = Address::where('adress_type_id', $graveyardTypeId)->get();

        $banks = DB::connection('mysql')->table('bank')->get();


        $memberships = Membership::with([
            'person.dependant.secondaryPerson', 
            'person.dependant.relationshipType', 
            'person'
            ])->get();

        return view('funerals.create', compact('churches','graveyards','memberships', 'banks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function handleFuneralAction(Request $request)
    {
        if ($request->action == 'submitActionOne') {
            return $this->submitActionOne($request);
        } elseif ($request->action == 'submitActionTwo') {
            return $this->submitActionTwo($request);
        }
        // Handle other actions or default case
    }

    protected function submitActionOne(Request $request)
    {
        dd('Handling Submit Action one', $request->all());


        DB::beginTransaction(); // Start the transaction

        try {
            // Validate required fields
            $validated = $request->validate([
                'person_id' => 'required|integer',
                'bu_id' => 'required|integer',
            ]);

            // Create a new instance of PersonHasFuneral
            $funeral = new PersonHasFuneral();

            // Assign fields from the request to the model
            $funeral->person_id = $request->person_id;
            $funeral->bu_id = $request->bu_id; //Get from logged in user
            $funeral->person_name = $request->person_name;
            $burialDateTime = $request->burial_date . ' ' . $request->burial_time;
            // Convert the combined string to a DateTime object and format it for storage
            $funeral->burial_date = Carbon::createFromFormat('Y-m-d H:i:s', $burialDateTime)->format('Y-m-d H:i:s');
            $funeral->church_name = Address::where('id', $request->churchSelect)->first()->name ?? null;
            $funeral->church_address_id = Address::where('id', $request->churchSelect)->first()->id ?? null;
            $funeral->graveyard_name = Address::where('id', $request->graveyardSelect)->first()->name ?? null;
            $funeral->grave_address_id = Address::where('id', $request->graveyardSelect)->first()->name ?? null;
            $funeral->grave_number = $request->grave_number;
            $funeral->funeral_notices = $request->notices;
            $funeral->viewing_time = $request->viewing_time;
            $funeral->viewing_address_id = $request->viewing_address_id; // Needs to be changed
            $funeral->arranging_employee_id = $request->arranging_employee_id; //Get this from the a dropdown to select and promt user to enter password for the selected user
            $funeral->executing_employee_id = $request->executing_employee_id; //Get this from the signed in user
            $funeral->checklist_notes = $request->checklist_notes;
            $funeral->preacher = $request->burial_person;
            $funeral->caretaker = $request->church_caretaker;
            $funeral->organist = $request->organist;
            $funeral->graveyard_section = $request->graveyard_section;
            $funeral->coffin = $request->coffin;

            // Save the funeral record
            $funeral->save();

            DB::commit(); // If everything went well, commit the transaction


            Log::info('All data processed.');
            return redirect()->route('funerals.index')->with('success', 'Funeral details have been added successfully.');
        } catch (\Exception $e) {
            DB::rollBack(); // Roll back on any error
            Log::error('Error in submitActionOne: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors('Error while saving funeral: ' . $e->getMessage());
        }

    }
    

    protected function submitActionTwo(Request $request)
    {
        dd('Handling Submit Action Two', $request->all());
    }



    protected function StoreFuneralAddress(Request $request, StoreAddress $storeAddress)
    {
        Log::info('Starting StoreFuneralAddress transaction.');
    
        DB::beginTransaction(); // Start the transaction
    
        try {
            // Log the incoming request data
            Log::info('Received data for StoreFuneralAddress:', $request->all());
    
            // Address Action Method injection
            $address = $storeAddress->handle($request);
            Log::info('Address handle method executed.');
    
            if (!$address) {
                Log::error('Address creation failed, address object is null.');
                throw new \Exception("The address could not be saved.");
            }
    
            // Ensure address type is loaded to include in the response
            $address->load('addressType');
            Log::info('Address type loaded.', ['addressTypeId' => $address->adress_type_id]);
    
            if (!$address->addressType) {
                Log::error('Failed to load address type details.');
                throw new \Exception("Failed to load address type.");
            }
    
            DB::commit(); // Commit the transaction if everything is okay
            Log::info('Transaction committed successfully.');
    
            // Return a detailed response for the frontend
            return response()->json([
                'id' => $address->id,
                'name' => $address->name,
                'suburb' => $address->suburb,
                'city' => $address->city,
                'line1' => $address->line1,
                'ZIP' => $address->ZIP,
                'type' => $address->addressType->name
            ]);
        } catch (\Exception $e) {
            DB::rollBack(); // Roll back the transaction on error
            Log::error('Transaction rolled back due to an error.', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return response()->json(['error' => 'Failed to store address', 'message' => $e->getMessage()], 500);
        }
    }
    
    
    
    

}
