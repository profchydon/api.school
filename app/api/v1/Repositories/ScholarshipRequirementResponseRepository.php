<?php

namespace App\Api\v1\Repositories;

use App\ScholarshipRequirementResponse;
use Illuminate\Http\Request;
use DB;


class ScholarshipRequirementResponseRepository
{

    /**
   * Create a  new User
   *
   * @param object $request
   *
   * @return object $user
   *
   */
    public function create($request)
    {

        try {

          // Begin database transaction
          DB::beginTransaction();

          // Create User
          $scholarship_requirement_response = ScholarshipRequirementResponse::create([

            'number_value' => $request->number_value,
            'string_value' => $request->string_value,
            'application_id' => $request->application_id,
            'requirement_id' => $request->requirement_id,
            'score' => $request->score,

          ]);

          if (!$scholarship_requirement_response) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $scholarship_requirement_response = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $scholarship_requirement_response;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }

}

?>
