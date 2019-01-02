<?php

namespace App\Api\v1\Repositories;

use App\FundingRequest;
use App\User;
use App\Student;
use Illuminate\Http\Request;
use DB;

/**
 *
 */
class FundingRequestRepository
{

    public function create($request)
    {

        try {

          $studentHasAnExistingFundingRequest = FundingRequest::where('student_id', $request->student_id)->first();

          if ($studentHasAnExistingFundingRequest != NULL) {

              $funding_request = "Student can only create one funding request at a time";
              return $funding_request;

          }else {

              // Begin database transaction
              DB::beginTransaction();

              // Create User
              $funding_request = FundingRequest::create([
                'student_id' => $request->student_id,
                'title' => $request->title,
                'image' => $request->image,
                'amount_needed' => $request->amount_needed,
                'amount_raised' => "0",
                'details' => $request->details,
                'end_date' => $request->end_date,
                'start_date' => $request->start_date,
              ]);

              if (!$funding_request) {

                // If User isn't created, rollback database to initial state
                DB::rollback();

                return $funding_request = "Oops! Sorry there was an error. Please try again";

              }else {

                // If User is created, commit transaction to the database
                DB::commit();

                return $funding_request;

              }
          }

        } catch (\Exception $e) {

        }

    }


}



 ?>
