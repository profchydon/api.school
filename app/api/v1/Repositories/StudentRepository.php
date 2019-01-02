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
class StudentRepository
{

    public function create($request)
    {

        try {

          // Begin database transaction
          DB::beginTransaction();

          // Create User
          $student = Student::create([
            'user_id' => $request->user_id,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
          ]);

          if (!$student) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $student = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $student;

          }

        } catch (\Exception $e) {

        }

    }


}



 ?>
