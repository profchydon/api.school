<?php

namespace App\Api\v1\Repositories;

use App\Question;
use Illuminate\Http\Request;
use DB;


class QuestionRepository
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
          $question = Question::create([

            'spec_id' => $request->spec_id,
            'statement' => $request->statement,
            'label' => $request->label,
            'answer_type' => $request->answer_type,
            'validation' => $request->validation,

          ]);

          if (!$question) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $question = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $question;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
