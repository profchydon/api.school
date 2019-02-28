<?php

namespace App\Api\v1\Repositories;

use App\ScholarshipRequirement;
use Illuminate\Http\Request;
use DB;


class ScholarshipRequirementRepository
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
          $scholarship_requirement = ScholarshipRequirement::create([

            'name' => $request->name,
            'label' => $request->label,
            'hint' => $request->hint,
            'widget' => $request->widget,
            'widget_options' => $request->widget_options,
            'context_id' => $request->context_id,
            'context_type' => $request->context_type,
            'base_score' => $request->base_score,

          ]);

          if (!$scholarship_requirement) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $scholarship_requirement = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $scholarship_requirement;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
