<?php

namespace App\Api\v1\Repositories;

use App\ThirdParty;
use Illuminate\Http\Request;
use DB;


class ThirdPartyRepository
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
          $third_party = ThirdParty::create([

            'name' => $request->name,
            'allow_urls' => $request->allow_urls,
            'deny_urls' => $request->deny_urls,
            'domains' => $request->domains,
            'secret' => $request->secret,
            'accepted' => $request->accepted,
            'encrypted_secret' => $request->encrypted_secret,
            'description' => $request->description,

          ]);

          if (!$third_party) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $third_party = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $third_party;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
