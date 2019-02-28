<?php

namespace App\Api\v1\Repositories;

use App\ScholarshipSponsor;
use Illuminate\Http\Request;
use DB;


class ScholarshipSponsorRepository
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
          $scholarship_sponsor = ScholarshipSponsor::create([

            'name' => $request->name,
            'logo' => $request->logo,
            'full_description' => $request->full_description,
            'website' => $request->website,
            'banner_image_url' => $request->banner_image_url,
            'amount' => $request->amount,
            'country' => $request->country,

          ]);

          if (!$scholarship_sponsor) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $scholarship_sponsor = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $scholarship_sponsor;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
