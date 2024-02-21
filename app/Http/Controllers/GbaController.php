<?php

namespace App\Http\Controllers;

use App\Models\Gba;
use App\Models\GbaMembership; // Assuming Gba model is replaced by GbaMembership

use App\Models\GbaDependent;
use App\Models\GbaDuplicateLog;

use App\Models\GbaMembershipDuplicate;
use App\Models\GbaDependentDuplicate;
use App\Models\GbaMembershipError;
use App\Models\GbaDependentError;
use App\Models\GbaErrorLog;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Models\Membership;
use App\Actions\StorePerson;

use Illuminate\Support\Facades\DB;

class GbaController extends Controller
{
    
    public function showGroupedRecords(Request $request)
    {
        $perPage = 1; // Display one membership record per page.
        $page = $request->input('page', 1);

        // Fetch distinct membership IDs that have a main record.
        $uniqueMembershipIds = $this->fetchOrRetrieveMembershipIds();

        // Calculate pagination offsets.
        $offset = ($page - 1) * $perPage;
        $total = count($uniqueMembershipIds);

        // Use array_slice for pagination since $uniqueMembershipIds is a Collection.
        $currentPageIds = $uniqueMembershipIds->slice($offset, $perPage)->all();

        // Fetch detailed records for the current page's membership IDs.
        $groupedRecords = array_filter(array_map([$this, 'fetchGroupedRecordsForMembershipId'], $currentPageIds));

        // Manually create a paginator.
        $paginatedItems = new LengthAwarePaginator(array_values($groupedRecords), $total, $perPage, $page, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);

        return view('resolutionhub', compact('paginatedItems'));
    }

    private function fetchOrRetrieveMembershipIds()
    {
        // Assuming GbaMembership model has 'membership_id' to fetch distinct IDs
        return GbaMembership::select('membership_id')->distinct()->orderBy('membership_id')->pluck('membership_id');
    }

    private function fetchGroupedRecordsForMembershipId($membershipId)
    {
        $mainRecord = GbaMembership::where('membership_id', $membershipId)->first();
    
        if ($mainRecord) {
            // Adjusted to fetch duplicates, excluding discarded duplicates
            $membershipDuplicates = GbaMembershipDuplicate::where('membership_id', $membershipId)
                                                          ->where(function($query){
                                                              $query->where('record_discarded', 0)
                                                                    ->orWhereNull('record_discarded');
                                                          })
                                                          ->get();
    
            $dependentDuplicates = GbaDependentDuplicate::where('membership_id', $membershipId)
                                                        ->where(function($query){
                                                            $query->where('record_discarded', 0)
                                                                  ->orWhereNull('record_discarded');
                                                        })
                                                        ->get();
    
            // Adjusted to fetch errors, excluding 'used' and 'discarded' errors
            $membershipErrors = GbaMembershipError::where('membership_id', $membershipId)
                                                  ->where('record_used', 0)
                                                  ->where(function($query){
                                                      $query->where('record_discarded', 0)
                                                            ->orWhereNull('record_discarded');
                                                  })
                                                  ->get();
    
            $dependentErrors = GbaDependentError::where('membership_id', $membershipId)
                                                ->where('record_used', 0)
                                                ->where(function($query){
                                                    $query->where('record_discarded', 0)
                                                          ->orWhereNull('record_discarded');
                                                })
                                                ->get();
    
            // Adjusted to fetch dependents, excluding 'discarded' dependents
            $dependents = GbaDependent::where('membership_id', $membershipId)
                                      ->where(function($query){
                                          $query->where('record_discarded', 0)
                                                ->orWhereNull('record_discarded');
                                      })
                                      ->get();
    
            // Combine duplicates and errors
            $combinedDuplicates = $membershipDuplicates->merge($dependentDuplicates);
            $combinedErrors = $membershipErrors->merge($dependentErrors);
    
            return [
                'membershipId' => $membershipId,
                'main' => $mainRecord,
                'duplicates' => $combinedDuplicates,
                'errors' => $combinedErrors,
                'dependents' => $dependents,
            ];
        }
    
        return null; // If no main record is found
    }
    
    
    public function handleMainRecordAction(Request $request, StorePerson $storePerson)
    {
        if ($request->action == 'submitActionOne') {
            return $this->submitActionOne($request,$storePerson);
        } elseif ($request->action == 'submitActionTwo') {
            return $this->submitActionTwo($request);
        }
        // Handle other actions or default case
    }
    
    protected function submitActionOne(Request $request, StorePerson $storePerson)
    {
        dd('Handling Submit Action One', $request->all());

        // I might consider not using the store person action and just submit a person manually
                //Person Action Method injection
                $person = $storePerson->handle((object) $request->all());
        
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
                // $membership->language_id = $language;
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
        
    }
    
    protected function submitActionTwo(Request $request)
    {
        dd('Handling Submit Action Two', $request->all());
    }
    

    public function processRecordAction(Request $request) {
        $actionType = $request->actionType;
        $recordId = $request->recordId;
        $details = $request->input('details', []);
    
        // Initially, no records are affected
        $affected = 0;
    
        // Models mapping based on the target_table_name
        $modelsMapping = [
            'gba_memberships' => [
                'error' => GbaMembershipError::class,
                'duplicate' => GbaMembershipDuplicate::class,
            ],
            'gba_dependents' => [
                'error' => GbaDependentError::class,
                'duplicate' => GbaDependentDuplicate::class,
            ],
        ];
    
        // Determine action context (error or duplicate) to select the right query part
        $actionContext = str_contains($actionType, 'Error') ? 'error' : 'duplicate';
    
        foreach ($modelsMapping as $targetTableName => $models) {
            $model = $models[$actionContext];
            
            if ($actionType === 'makeDependentError' && $actionContext === 'error') {
                // Check for 'makeDependentError' action to process details
                if (!empty($details)) {
                    $affected += $this->processMakeDependentError($model, $recordId, $details);
                }
            } elseif (in_array($actionType, ['discardError', 'discardDuplicate'])) {
                $updateCount = $model::where('id', $recordId)
                                     ->update(['record_discarded' => 1]);
                $affected += $updateCount ? 1 : 0;
            }
        }
    
        if ($affected > 0) {
            return response()->json(['success' => true, 'message' => 'Record updated successfully.']);
        }
    
        return response()->json(['success' => false, 'message' => 'No records found to update.'], 422);
    }
    
    protected function processMakeDependentError($model, $recordId, $details) {
        $record = $model::find($recordId);
        if (!$record || $record->record_used || $record->record_discarded) {
            return 0; // No action needed if the record doesn't exist or is already processed
        }
    
        $record->record_used = 1;
        $record->save(); // Mark the error record as used
    
        $newRecord = new GbaDependent();
        foreach ($details as $key => $value) {
            // This loop must include and correctly assign 'membership_id' from $details
            $newRecord->$key = $value;
        }
        $newRecord->save(); // Save the new GbaDependent record
    
        return 1; // Indicate success
    }

    

    // Dependents Section
    
    public function markAsComplete(Request $request, $dependentId)
    {
        $dependent = GbaDependent::findOrFail($dependentId);
        $dependent->record_completed = 1;
        $dependent->save();

        return response()->json(['success' => true, 'message' => 'Dependent marked as complete.']);
    }

    public function removeDependent(Request $request, $dependentId)
    {
        $dependent = GbaDependent::findOrFail($dependentId);
        $dependent->record_discarded = 1;
        $dependent->save();

        return response()->json(['success' => true, 'message' => 'Dependent removed.']);
    }
    

}
