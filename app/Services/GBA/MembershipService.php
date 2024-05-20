<?php
namespace App\Services\GBA;

use Illuminate\Http\Request; 
use App\Models\Membership;
use App\Models\MembershipAddress;
use Carbon\Carbon;
use Log;

class MembershipService
{
    public function createMembership(Request $request, $personId, $addressId)
    {
        $membership = new Membership();
        $membership->membership_code = $request->membership_id; // Adjust according to actual field
        $membership->name = $request->first_name; // Assuming you want to use the main person's name
        $membership->initials = $request->initials;
        $membership->surname = $request->last_name;
        $membership->id_number = $request->id_number;
        $membership->gender_id = $request->gender_id;
        $membership->bu_id = 7;
        $membership->language_id  = 1;
        $membership->bu_membership_type_id = 1;
        $membership->bu_membership_region_id = 1; // Assuming static
        $membership->bu_membership_status_id = 1; // This should be changed
        $membership->person_id = $personId;
        $membership->primary_contact_number = $request->primary_contact_number;
        $membership->secondary_contact_number = $request->secondary_contact_number;
        $membership->primary_e_mail_address = $request->primary_e_mail_address;
        $membership->fee_currency_id = 149; // Assuming static
        $membership->preferred_payment_method_id = 2; //Set to cash

        $membership->save();
        Log::info("Membership created: {$membership->id}");

        // Create a MembershipAddress association (Membership Has Address)
        $this->createMembershipAddress($membership->id, $addressId);

        return $membership;
    }

    private function createMembershipAddress($membershipId, $addressId)
    {
        // Membership Has Address
        $membershipAddress = new MembershipAddress([
            'membership_id' => $membershipId,
            'address_id' => $addressId,
            'adress_type_id' => 1, // 1 = Residential
            'start_date' => Carbon::today(), // Carbon today
        ]);
        $membershipAddress->save();
        Log::info("Membership address created for membership ID {$membershipId}");
    }
}
