<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
use App\Models\Dependent;
use App\Models\Person;
use App\Models\PersonHasPerson;

class DeathController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
      {
        $memberships = Membership::with(['person.dependant.secondaryPerson', 'person.dependant.relationshipType', 'person'])->get();
        //dd($memberships);
      return view('deaths.index', compact('memberships'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         // Begin a transaction in case you need to rollback if something goes wrong
        DB::beginTransaction();
        try {
            // // Store reporter details
            // $reporter = new Reporter();
            // $reporter->name = $validatedData['reporting_name'];
            // $reporter->surname = $validatedData['reporting_surname'];
            // // ... Set all other reporter attributes from the validatedData
            // $reporter->save();

            // // Store deceased details
            // $deceased = new Deceased();
            // $deceased->name = $validatedData['deceased_name'];
            // $deceased->surname = $validatedData['deceased_surname'];
            // // ... Set all other deceased attributes from the validatedData
            // // Assume foreign key to reporter is 'reporter_id'
            // $deceased->reporter_id = $reporter->id;
            // $deceased->save();

            // Commit the transaction
            DB::commit();

            // Return a successful response, e.g., a redirect with a success message
            return redirect()->route('wherever.you.want')->with('success', 'Death record stored successfully');
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollback();

            // Return an error response, e.g., redirect back with an error message
            return back()->withErrors('Failed to store death record')->withInput();
        }
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

    function calculateAge($birthDate) {
        if ($birthDate === null) {
            return null; // Handle cases where birthDate might be null
        }
        $birthDate = new \DateTime($birthDate); // Use the backslash to refer to the global namespace
        $today = new \DateTime('now');
        $interval = $birthDate->diff($today);
        return $interval->y; // Returns the total number of years
    }
    
    
    public function getPersonDetails($id)
    {
        // Fetch person details with the possibility of including related data if necessary
        $person = Person::findOrFail($id);
    
        // Using the function to calculate age
        $age = $this->calculateAge($person->birth_date);
        
        // Prepare the data to send as JSON
        $data = [
            'name' => $person->first_name,
            'surname' => $person->last_name,
            'id_number' => $person->id_number,
            'birth_date' => $person->birth_date,
            'age' => $age,
            'sex' => $person->gender_id,
            'marital_status_id' => $person->married_status,
        ];
    
        return response()->json($data);
    }
    
}
