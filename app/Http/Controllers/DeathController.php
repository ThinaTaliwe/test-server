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
    public function index()
    {
        $membershipsDependant = Membership::with(['person.dependant.secondaryPerson', 'person.dependant.relationshipType', 'person'])->get();

        $memberships = Membership::with(['person.dependant'])
            ->get()
            ->map(function ($membership) {

                $data = [];
                foreach ($membership->person->dependant as $dependant) {
                    $data[] = [
                        'membership_id' => $membership->id,
                        'main_member' => $membership->name,
                        'dependant' => $membership->person_id, 
                    ];
                }

                if (empty($data)) {
                    $data[] = [
                        'membership_id' => $membership->id,
                        'main_member' => $membership->name,
                        'dependant' => 'No dependants',
                    ];
                }

                return $data;
            })
            ->collapse(); 

        return view('deaths.index', compact('memberships', 'membershipsDependant'));
    }
**/

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
}
