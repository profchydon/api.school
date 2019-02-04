<?php

namespace App\Api\v1\Repositories;

use App\UserCard;
use Illuminate\Http\Request;
use DB;


class UserCardRepository
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
          $user_card = UserCard::create([

            'user_id' => $request->user_id,
            'gateway' => $request->gateway,
            'token' => $request->token,
            'active' => $request->active,
            'currency' => $request->currency,

          ]);

          if (!$user_card) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $user_card = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $user_card;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
