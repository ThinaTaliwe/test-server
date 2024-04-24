<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDependantRequest;
use App\Models\Dependant;
use App\Models\Membership;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


/**
 * Dependants Controller
 *
 * This controller handles the creation, deletion and listing of dependants.
 *
 * @category Controller
 * @package  App\Http\Controllers
 */
class DependantsController extends Controller
{
    /**
     * Display a listing of the dependants.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dependants = Dependant::all();
        return view('dependants', ['dependants' => $dependants]);
    }



    /**
     * Store a newly created dependant in storage.
     *
     * @param  \App\Http\Requests\StoreDependantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDependantRequest $request)
    {
        // Get the first letter of the first name and surname for initials
        $initials = ucfirst(substr($request->Name, 0, 1)) . '.' . ucfirst(substr($request->Surname, 0, 1));

        // Create a new person object
        $person = new Person();

        // Set the person's attributes
        $person->first_name = ucfirst($request->Name);
        $person->initials = $initials;
        $person->last_name = ucfirst($request->Surname);
        $person->screen_name = $request->Name . ' ' . ucfirst($request->Surname);
        $person->id_number = $request->IDNumberDep;
        $person->birth_date = $request->inputYearDep . '-' . $request->inputMonthDep . '-' . $request->inputDayDep;
        $person->gender_id = $request->radioGenderDep;
        $person->residence_country_id = 197;
        \Log::info('Memory usage before operation: ' . memory_get_usage());
        // Save the person
        $person->save();
        \Log::info('Memory usage after operation: ' . memory_get_usage());

        // Create a new dependant object
        $dependant = new Dependant();

        // Set the dependant's attributes
        $dependant->primary_person_id = $request->mainMemberId;
        $dependant->secondary_person_id = $person->id;
        $dependant->person_relationship_id = $request->radioRelationCode;

        // Save the dependant
        $dependant->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Dependant Added Successfully!!!');
    }

    /**
     * Remove the specified dependant from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // Delete the dependent on the Person_has_person table
        Dependant::where('secondary_person_id', $id)->delete();

        // Delete the dependant on the person table
        Person::where('id', $id)->delete();

        // Redirect back with success message
        return redirect()->back()->withSuccess('Dependant Has Been Removed!');
    }
}
