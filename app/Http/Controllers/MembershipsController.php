<?php
/**
 * PHP version 9
 *
 * @author    Siyabonga Alexander Mnguni <alexmnguni57@gmail.com>
 * @copyright 2023 1Office
 * @license   MIT License
 * @link      https://github.com/alexmnguni57/1Office-GBA
 */

namespace App\Http\Controllers;

use App\Actions\StoreAddress;
use App\Actions\StorePerson;
use App\Http\Requests\StoreMembershipRequest;
use App\Models\Address;
use App\Models\BuMembershipType;
use App\Models\Country;
use App\Models\Dependant;
use App\Models\Membership;
use App\Models\MembershipAddress;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MembershipsController extends Controller
{
    public function index(Request $request)
    {
        $memberships = Membership::all()->sortByDesc('created_at')->values();
        // Check if memberships collection is empty
        if ($memberships->isEmpty()) {
            // If the database is empty, provide an appropriate response to the user
            return view('emptyPage');
        }

        $membership = Membership::where('id', $request->id)->first();
        // $dependants = Dependant::where('primary_person_id', $membership->person_id)->get();
         //dd($memberships);

        return view('memberships', ['memberships' => $memberships]);
    }

    public function create()
    {
        $memtypes = BuMembershipType::all();
        $countries = Country::all();

        return view('add-member', ['memtypes' => $memtypes, 'countries' => $countries]);
    }

    public function store(StoreMembershipRequest $request, StorePerson $storePerson, StoreAddress $storeAddress)
    {
        DB::beginTransaction(); // Start the transaction

        try {
            // Convert request data to object if necessary or directly pass $request
            $requestData = (object) $request->all();

            // Person Action Method injection
            $person = $storePerson->handle($requestData);

            // Address Action Method injection
            $address = $storeAddress->handle($requestData);

            // Assuming you have language logic handled appropriately
            $language = $request->language != null ? 2 : 1;

            // Membership creation
            $membership = new Membership();
            $membership->fill([
                'membership_code' => 1212121, // Example code
                'name' => ucfirst($request->Name),
                'initials' => ucfirst(substr($request->Name, 0, 1)) . '.' . ucfirst(substr($request->Surname, 0, 1)),
                'surname' => ucfirst($request->Surname),
                'id_number' => $request->IDNumber,
                'gender_id' => $request->radioGender,
                'join_date' => Carbon::today(),
                'bu_id' => 7,
                'bu_membership_type_id' => $request->memtype,
                'bu_membership_region_id' => 1,
                'bu_membership_status_id' => 1,
                'language_id' => $language,
                'person_id' => $person->id, // Ensure StorePerson action returns saved Person
                'primary_contact_number' => $request->Telephone,
                'secondary_contact_number' => $request->WorkTelephone,
                'sms_number' => $request->Telephone,
                'primary_e_mail_address' => $request->Email,
                'preferred_payment_method_id' => 1, //$request->paymentMethod
                'fee_currency_id' => 149,
            ]);

            $membership->save();
            Log::info('Saved membership');

            // Membership Has Address
            $membershipAddress = new MembershipAddress([
                'membership_id' => $membership->id,
                'address_id' => $address->id,
                'adress_type_id' => 1, // 1 = Residential
                'start_date' => Carbon::today(), // Carbon today
            ]);

            $membershipAddress->save();

            DB::commit(); // Commit the transaction

            return redirect("/edit-member/$membership->id")->with('success', 'Membership Added Successfully!');
        } catch (\Exception $exception) {
            DB::rollBack(); // Rollback the transaction on any error
            Log::error('Error processing membership: ' . $exception->getMessage());
            return redirect()
                ->back()
                ->with('error', 'Failed to process membership: ' . $exception->getMessage())
                ->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        Log::info('Update method called for membership ID: ' . $id);

        $request->validate([
            'Name' => 'required|string|max:255',
            'Surname' => 'required|string|max:255',
            'IDNumber' => 'required',
            'Telephone' => 'nullable',
            'WorkTelephone' => 'nullable',
            'Email' => 'nullable|email',
            'inputDay' => 'required|numeric|min:1|max:31',
            'inputMonth' => 'required|numeric|min:1|max:12',
            'inputYear' => 'required|numeric|min:1900|max:2100',
            'language' => 'nullable',
            'radioGender' => 'required',
            'marital_status' => 'required',
            'memtype' => 'required',
            // Add other fields and rules as needed
        ]);

        $membership = Membership::findOrFail($id);
        Log::info('Found membership', ['id' => $id]);

        // Assign new values from the request
        $membership->language_id = $request->language;
        $membership->name = $request->Name;
        $membership->surname = $request->Surname;
        $membership->id_number = $request->IDNumber;
        $membership->gender_id = $request->radioGender;
        $membership->primary_contact_number = $request->Telephone;
        $membership->secondary_contact_number = $request->WorkTelephone;
        $membership->primary_e_mail_address = $request->Email;
        $membership->bu_membership_type_id = $request->memtype;

        // Log the old and new values to see what's being attempted to update
        Log::info('Old membership data', $membership->getOriginal());
        Log::info('New membership data', $request->all());

        // Assuming you have a relationship set up for the person details
        $membership->person->birth_date = $request->inputYear . '-' . $request->inputMonth . '-' . $request->inputDay;
        $membership->person->married_status = $request->marital_status;

        // Check if any of the membership or related person model's fields are dirty
        if ($membership->isDirty() || $membership->person->isDirty()) {
            // Save changes if there are any
            $membership->push(); // Saves the model and all of its relationships

            Log::info('Membership and/or related person model was dirty and has been saved.', ['membership_id' => $membership->id]);

            // return redirect("/edit-member/$membership->id")->with('success', 'Membership updated successfully.');
            return redirect()->back()->withSuccess('Membership updated successfully!');
        } else {
            Log::info('No changes detected for membership.', ['membership_id' => $membership->id]);
        }
        // If no changes were detected
        // return back()->with('info', 'No changes were detected.');
        redirect()->back()->withInfo('No changes were detected');
    }

    public function show($id, Request $request)
    {
        $membership = Membership::where('id', $id)->first();

        $dependants = Dependant::where('primary_person_id', $membership->person_id)->get();

        $memtypes = DB::select('select * from bu_membership_type');

        $countries = DB::select('select * from country');

        $payments = DB::select('select * from membership_payment_receipts');

        $addresses = $membership->address;

        $disabled = 'inert';

        $billings = DB::select('select * from membership_payment_receipts');

        // dd($billings);
        return view('view-member', ['membership' => $membership, 'dis' => $disabled, 'dependants' => $dependants, 'memtypes' => $memtypes, 'countries' => $countries, 'addresses' => $addresses, 'payments' => $payments, 'billings' => $billings]);
    }

    public function edit($id)
    {
        $membership = Membership::where('id', $id)->first();

        $dependants = Dependant::where('primary_person_id', $membership->person_id)->get();

        $memtypes = DB::select('select * from bu_membership_type');

        $countries = DB::select('select * from country');

        // foreach ($membership->membershipaddress as $memaddress) {
        //     $addresses = Address::where('id', $memaddress->membership_id)->get();
        // }

        $addresses = $membership->address;

        $disabled = '';

        return view('edit-member', ['membership' => $membership, 'dis' => $disabled, 'dependants' => $dependants, 'memtypes' => $memtypes, 'countries' => $countries, 'addresses' => $addresses])->with('success', 'Updated Successfully!!!!!');
    }

    /**
     * A delete by id function
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        $memId = Membership::where('id', $id)->first();

        //This deletes the membership
        $memId->delete();

        //This deletes the main person who the membership belongs to
        $memId->person->delete();

        //This gets all the dependants and deletes them
        $deps = $memId->person->dependant;

        //This must delete all addresses that belongs to the person

        // Add Code

        foreach ($deps as $dep) {
            Person::where('id', $dep->secondary_person_id)->delete();
        }

        return redirect()->back()->withSuccess('Membership Has Been Cancelled!');
    }

    public function getData()
    {
        $memberships = Membership::all()->sortByDesc('created_at')->values();
        return response()->json($memberships);
    }
}
