<?php

namespace App\Api\v1\Repositories;

use App\Oauth;
use Illuminate\Http\Request;
use DB;


class OauthRepository
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
          $oauth = Oauth::create([

            'user_id' => $request->user_id,
            'oauth_id' => $request->oauth_id,
            'provider' => $request->provider,
            'name' => $request->name,
            'email' => $request->email,

          ]);

          if (!$oauth) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $oauth = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $oauth;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
