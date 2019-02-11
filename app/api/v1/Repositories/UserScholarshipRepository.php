<?php

namespace App\Api\v1\Repositories;

use App\UserScholarship;
use Illuminate\Http\Request;
use DB;


class UserScholarshipRepository
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
          $user_scholarship = UserScholarship::create([

            'user_id' => $request->user_id,
            'scholarship_id' => $request->scholarship_id,

          ]);

          if (!$user_scholarship) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $user_scholarship = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $user_scholarship;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
