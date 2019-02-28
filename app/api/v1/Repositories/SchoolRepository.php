<?php

namespace App\Api\v1\Repositories;

use App\School;
use Illuminate\Http\Request;
use DB;


class SchoolRepository
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
          $school = School::create([

            'name' => $request->name,
            'state' => $request->logo,
            'country' => $request->country,

          ]);

          if (!$school) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $school = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $school;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
