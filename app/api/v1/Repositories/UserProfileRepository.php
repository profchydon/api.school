<?php

namespace App\Api\v1\Repositories;

use App\UserProfile;
use Illuminate\Http\Request;
use DB;


class UserProfileRepository
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
          $user_profile = UserProfile::create([

            'user_id' => $request->user_id,
            'allow_push' => $request->allow_push,
            'image' => $request->image,
            'state' => $request->state,
            'country' => $request->country,
            'city' => $request->city,
            'currency' => $request->currency,
            'zip_code' => $request->zip_code,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,

          ]);

          if (!$user_profile) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $user_profile = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $user_profile;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
