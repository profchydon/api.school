<?php

namespace App\Api\v1\Repositories;

use App\UserPayment;
use Illuminate\Http\Request;
use DB;


class UserPaymentRepository
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
          $user_payment = UserPayment::create([

            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'reference' => $request->reference,
            'confirmed_at' => $request->confirmed_at,
            'used_at' => $request->used_at,
            'agent' => $request->agent,
            'status' => $request->status,

          ]);

          if (!$user_payment) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $user_payment = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $user_payment;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
