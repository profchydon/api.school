<?php

namespace App\Api\v1\Repositories;

use App\PaymentRecord;
use Illuminate\Http\Request;
use DB;


class PaymentRecordRepository
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
          $payment_record = PaymentRecord::create([

            'user_id' => $request->user_id,
            'client' => $request->client,
            'amount' => $request->amount,
            'provider' => $request->provider,
            'order_id' => $request->order_id,
            'provider_id' => $request->provider_id,
            'currency' => $request->currency,
            'meta_data' => $request->meta_data,

          ]);

          if (!$payment_record) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $payment_record = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $payment_record;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
