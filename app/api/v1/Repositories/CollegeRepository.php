<?php

namespace App\Api\v1\Repositories;

use App\College;
use Illuminate\Http\Request;
use DB;


class CollegeRepository
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
          $college = College::create([

            'name' => $request->name,
            'country' => $request->country,

          ]);

          if (!$college) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $college = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $college;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
