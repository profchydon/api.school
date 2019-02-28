<?php

namespace App\Api\v1\Repositories;

use App\Faculty;
use Illuminate\Http\Request;
use DB;


class FacultyRepository
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
          $faculty = Faculty::create([

            'name' => $request->name,
            'department' => $request->department,
            'state' => $request->state,
            'country' => $request->country,

          ]);

          if (!$faculty) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $faculty = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $faculty;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
