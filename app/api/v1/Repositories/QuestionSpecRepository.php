<?php

namespace App\Api\v1\Repositories;

use App\QuestionSpec;
use Illuminate\Http\Request;
use DB;


class QuestionSpecRepository
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
          $question_spec = QuestionSpec::create([

            'header' => $request->header,
            'requirements' => $request->requirements,
            'category' => $request->category,
            'version' => $request->version,

          ]);

          if (!$question_spec) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $question_spec = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $question_spec;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
