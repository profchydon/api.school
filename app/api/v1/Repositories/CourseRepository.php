<?php

namespace App\Api\v1\Repositories;

use App\Course;
use Illuminate\Http\Request;
use DB;


class CourseRepository
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
          $course = Course::create([

            'name' => $request->name,
            'country' => $request->country,

          ]);

          if (!$course) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $course = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $course;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
