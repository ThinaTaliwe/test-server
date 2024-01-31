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

class MembershipsController extends Controller
{
    
    public function index()
    {
        $memberships = Membership::all()->sortByDesc('created_at')->values();
        return view('memberships', compact(memberships));
    }

    public function create()
    {
        $memtypes = BuMembershipType::all();
        $countries = Country::all();

        return view('add-member', ['memtypes' => $memtypes, 'countries' => $countries]);
    }

    public function store(StoreMembershipRequest $request, StorePerson $storePerson, StoreAddress $storeAddress)
    {

        //And also dont mass assign e.g create([..,..]);
        //Always request input individually

        if ($request->language != null) {
            $language = 2;
        } else {
            $language = 1;
        };

        //Person Action Method injection
        $person = $storePerson->handle((object) $request->all());

        //Address
        $address = $storeAddress->handle((object) $request->all());

        //Membership

        $membership = new Membership();
        //TODO - Membership code format from GBA
        $membership->membership_code = 1212121;
        $membership->name = ucfirst($request->Name);
        $membership->initials = ucfirst(substr($request->Name, 0, 1)) . "." . ucfirst(substr($request->Surname, 0, 1));
        $membership->surname = ucfirst($request->Surname);
        $membership->id_number = $request->IDNumber;
        // $membership->join_date = $request->input('');
        // $membership->end_date = $request->input('');
        // $membership->end_reason = $request->input('');
        $membership->gender_id = $request->radioGender;
        $membership->bu_membership_type_id = $request->memtype;
        $membership->bu_membership_region_id = 1;
        $membership->bu_membership_status_id = 1;
        $membership->language_id = $language;
        $membership->person_id = $person->id;
        //$membership->previous_membership_id = 1;

        $membership->primary_contact_number = $request->Telephone;
        $membership->secondaty_contact_number = $request->WorkTelephone;
        // $membership->terciary_contact_number = $request->email;
        $membership->sms_number = $request->Telephone;
        $membership->primary_e_mail_address = $request->Email;
        // $membership->secondary_e_mail_address = $request->email;
        // $membership->membership_fee = $request->email;
        $membership->fee_currency_id = 149;
        // $membership->last_payment_date = $request->email;
        //$membership->paid_till_date = $request->email;

        try {
            $membership->save();
        } catch (\Exception$exception) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'There was a problem while creating membership');
        }

        //Membership Has Address
        $membership_address = new MembershipAddress();

        $membership_address->membership_id = $membership->id;
        $membership_address->address_id = $address->id;
        $membership_address->adress_type_id = 1; //1 = Residential
        $membership_address->start_date = Carbon::today(); //Carbon today

        $membership_address->save();

        // return redirect("/edit-member/$membership->id")->withSuccess('Membership Added Successfully!');
        return redirect("/edit-member/$membership->id")->with('success', 'Membership Added Successfully!!!!!');



    }

    public function update()
    {

    }

    public function show($id)
    {
        $membership = Membership::where('id', $id)->first();

        $dependants = Dependant::where('primary_person_id', $membership->person_id)->get();

        $memtypes = DB::select('select * from bu_membership_type');

        $countries = DB::select('select * from country');

        $addresses = $membership->address;

        $disabled = 'inert';

        // dd($membership);
        return view('view-member', ['membership' => $membership, 'dis' => $disabled, 'dependants' => $dependants, 'memtypes' => $memtypes, 'countries' => $countries, 'addresses' => $addresses]);
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

        return view('view-member', ['membership' => $membership, 'dis' => $disabled, 'dependants' => $dependants, 'memtypes' => $memtypes, 'countries' => $countries, 'addresses' => $addresses])->with('success', 'Updated Successfully!!!!!');;
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
        };

        return redirect()->back()->withSuccess('Membership Has Been Cancelled!');

    }

}
