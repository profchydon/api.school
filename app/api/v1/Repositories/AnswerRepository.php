<?php

namespace App\Api\v1\Repositories;

use App\Answer;
use Illuminate\Http\Request;
use DB;


class AnswerRepository
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
          $answer = Answer::create([

            'question_id' => $request->question_id,
            'statement' => $request->statement,
            'candidate_id' => $request->candidate_id,
            'candidate_type' => $request->candidate_type,

          ]);

          if (!$answer) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $answer = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $answer;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
