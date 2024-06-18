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
use App\Models\FuneralChecklistItems;

use App\Models\Transactions;
use App\Models\FuneralHasTransactions;

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
        $deceased_people = Person::where('deceased', 1)->get();
      
        return view('funerals.index', compact('deceased_people'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $deceased_person = Person::findOrFail($id);
        // Fetch the 'Church' address type ID
        $churchTypeId = AddressType::where('name', 'Church')->first()->id ?? null;

        // Fetch the 'Graveyard' address type ID
        $graveyardTypeId = AddressType::where('name', 'Graveyard')->first()->id ?? null;

        // Fetch the 'Viewing' address type ID
        $viewingTypeId = AddressType::where('name', 'Viewing')->first()->id ?? null;

        // Fetch all addresses with the 'Church' type ID
        $churches = Address::where('adress_type_id', $churchTypeId)->get();
        
        // Fetch all addresses with the 'Church' type ID
        $graveyards = Address::where('adress_type_id', $graveyardTypeId)->get();

        // Fetch all addresses with the 'Viewing' type ID
        $viewinglocations = Address::where('adress_type_id', $viewingTypeId)->get();

        $banks = DB::connection('mysql')->table('bank')->get();

        $checklist_items = FuneralChecklistItems::where('bu_id', 7)->get();


        $memberships = Membership::with([
            'person.dependants.personDep', 
            'person.dependants.relationshipType', 
            'person'
            ])->get();

        return view('funerals.create', compact('churches','graveyards','memberships', 'banks', 'deceased_person', 'checklist_items', 'viewinglocations','churchTypeId','graveyardTypeId', 'viewingTypeId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $funeral = new Funeral();
        // $funeral->person_id = $request->person_id; 
        // $funeral->bu_id = Auth::user->current_bu_id;
        // $funeral->funeral_required = $request->MISSING;//Todo
        // $funeral->church_name = Address::where('id', $churchSelect)->first()->name ?? null;
        // $funeral->person_name = Address::where('id', $person_id)->first()->first_name ?? null;
        // $funeral->church_address_id  = $request->churchSelect;
        // $funeral->graveyard_name = Address::where('id', $graveyardSelect)->first()->name ?? null;
        // $funeral->grave_address_id  = $request->graveyardSelect;
        // $funeral->graveyard_section = $request->graveyard_section;

        // $funeral->grave_number = $request->grave_number;
        // $funeral->church_name = $request->burial_date;//Todo
        // $funeral->burial_date = $request->burial_date . ' ' . $request->burial_time;

        // $funeral->coffin = $request->coffin;
        // $funeral->viewing_time = $request->viewing_time; 
        // $funeral->viewing_address_id = $request->viewing_location; 

        // $funeral->preacher = $request->burial_person; 
        // $funeral->MISSING = $request->church_office; //Todo - store in address contact table
        // $funeral->caretaker = $request->church_caretaker;
        // $funeral->MISSING = $request->contact_number;//Todo - store in address contact table
        // $funeral->organist = $request->organist;
        // $funeral->funeral_notices = $request->Notices;
        // $funeral->save();


        // //ToDO - move this to its own function to store an update the checklist
        // $funeral_check = new FuneralCheck();
        // //Use a loop to get all the items
        // $funeral_check->funeral_id = $funeral->id;
        // $funeral_check->funeral_id = $funeral->id;
        
        // $funeral_check->save();


        // $funeral_transactions = new FuneralHastansactions();
        // $funeral_transactions->funeral_id = $funeral->id;
        // $funeral_transactions->funeral_id = $funeral->id;
        
        // $funeral_transactions->save();



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

            // Create a new instance of Funeral
            $funeral = new Funeral();

            // Assign fields from the request to the model
            $funeral->person_id = $request->person_id;
            $funeral->bu_id = Auth::user->current_bu_id;
            $funeral->funeral_required = $request->MISSING;//Todo
            $funeral->person_name = $request->person_name;
            $burialDateTime = $request->burial_date . ' ' . $request->burial_time;
            // Convert the combined string to a DateTime object and format it for storage
            $funeral->burial_date = Carbon::createFromFormat('Y-m-d H:i:s', $burialDateTime)->format('Y-m-d H:i:s');
            $funeral->church_name = Address::where('id', $request->churchSelect)->first()->name ?? null;
            $funeral->church_address_id = $request->churchSelect;
            $funeral->graveyard_name = Address::where('id', $request->graveyardSelect)->first()->name ?? null;
            $funeral->grave_address_id = $request->graveyardSelect;
            $funeral->grave_number = $request->grave_number;
            $funeral->funeral_notices = $request->notices;
            $funeral->viewing_time = $request->viewing_time;
            $funeral->viewing_address_id = $request->viewing_location;

            $funeral->arranging_employee_id = $request->arranging_employee_id; //TODO - Get this from the a dropdown to select and promt user to enter password for the selected user
            $funeral->executing_employee_id = $request->executing_employee_id; //TODO - Get this from the signed in user
            
            $funeral->checklist_notes = $request->checklist_notes;
            $funeral->preacher = $request->burial_person;
            $funeral->caretaker = $request->church_caretaker;
            $funeral->organist = $request->organist;
            $funeral->graveyard_section = $request->graveyard_section;
            $funeral->coffin = $request->coffin;

            // Save the funeral record
            $funeral->save();

            // //ToDO - move this to its own function to store an update the checklist
            // $funeral_check = new FuneralCheck();
            // //Use a loop to get all the items
            // $funeral_check->funeral_id = $funeral->id;
            // $funeral_check->funeral_id = $funeral->id;
            
            // $funeral_check->save();

            
            // TODO create a loop foreach transaction
            // Create a transaction for each cost
            $funeral_costs = new Transactions();
            $funeral_costs->bu_id  = $request->yyyyy;
            $funeral_costs->transaction_type_id = $request->yyyyy;
            $funeral_costs->transaction_date = $request->yyyyy;
            $funeral_costs->transaction_qty = $request->yyyyy;
            $funeral_costs->membership_id  = $request->yyyyy;
            // $funeral_costs->xxxxx = $request->yyyyy;
            $funeral_costs->created_employee_id  = $request->yyyyy;
            $funeral_costs->last_updated_employee_id  = $request->yyyyy;
            $funeral_costs->save();

            //Link each transaction to funeral
            $funeral_costs = new FuneralHasTransactions();
            $funeral_costs->bu_id  = $request->yyyyy;
            $funeral_costs->transaction_type_id = $request->yyyyy;
            $funeral_costs->transaction_date = $request->yyyyy;
            $funeral_costs->transaction_qty = $request->yyyyy;
            $funeral_costs->membership_id  = $request->yyyyy;
            // $funeral_costs->xxxxx = $request->yyyyy;
            $funeral_costs->created_employee_id  = $request->yyyyy;
            $funeral_costs->last_updated_employee_id  = $request->yyyyy;
            $funeral_costs->save();



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

    public function updateChecklistItem(Request $request, $id)
    {
        $item = FuneralCheck::find($id);
        
        if (!$item) {
            $item = new FuneralCheck;
        }

        $item->funeral_id = $request->funeral_id;
        $item->funeral_checklist_id = $request->input('funeral_checklist_id');
        $item->bu_id = Auth::user->current_bu_id;
        $item->completed_date = $request->input('completed_date');
        $item->completed_time = $request->input('completed_time');
        $item->note = $request->input('note');
        $item->save();

        return response()->json(['success' => true]);
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


    protected function StoreFuneralBeneficiary(Request $request, StoreAddress $storeAddress)
    {
        Log::info('Starting StoreFuneralBeneficiary transaction.');
    
        DB::beginTransaction(); // Start the transaction
    
        try {
            // Log the incoming request data
            Log::info('Received data for StoreFuneralBeneficiary:', $request->all());
    
            // Address Action Method injection
            $address = $storeAddress->handle($request);
            Log::info('Address handle method executed.');
    
            if (!$address) {
                Log::error('Address creation failed, address object is null.');
                throw new \Exception("The address could not be saved.");
            }


            //Now we store the beneficiary


            





    
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
