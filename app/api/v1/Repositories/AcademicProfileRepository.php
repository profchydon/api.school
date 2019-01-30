<?php

namespace App\Api\v1\Repositories;

use App\FundingRequest;
use App\User;
use App\AcademicProfile;
use Illuminate\Http\Request;
use DB;

/**
 *
 */
class AcademicProfileRepository
{

    public function create($request)
    {

        try {

          // Begin database transaction
          DB::beginTransaction();

          // Create User
          $academic_profile = AcademicProfile::create([
            'user_id' => $request->user_id,
            'picture' => $request->picture,
            'institution' => $request->institution,
            'category' => $request->category,
            'date_started' => $request->date_started,
            'meta_data' => $request->meta_data,
            'country' => $request->country,
            'state' => $request->state,
            'app_limit' => $request->app_limit,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
  
          ]);

          if (!$academic_profile) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $academic_profile = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $academic_profile;

          }

        } catch (\Exception $e) {

        }

    }


}



 ?>
