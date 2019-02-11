<?php

namespace App\Api\v1\Repositories;

use App\Sponsor;
use Illuminate\Http\Request;
use DB;


class SponsorRepository
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
          $sponsor = Sponsor::create([

            'user_id' => $request->user_id,
            'third_party_id' => $request->third_party_id,
            'name' => $request->name,
            'picture' => $request->picture,
            'title' => $request->title,
            'email' => $request->email,
            'phone' => $request->phone,
            'is_anonymous' => $request->is_anonymous,
            'comments' => $request->comments,

          ]);

          if (!$sponsor) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $sponsor = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $sponsor;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
