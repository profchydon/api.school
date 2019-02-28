<?php

namespace App\Api\v1\Repositories;

use App\ScholarshipCollection;
use Illuminate\Http\Request;
use DB;


class ScholarshipCollectionRepository
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
          $scholarship_collection = ScholarshipCollection::create([

            'name' => $request->name,
            'description' => $request->description,
            'image_url' => $request->image_url,
            'repeats' => $request->repeats,
            'pub_id' => $request->pub_id,

          ]);

          if (!$scholarship_collection) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $scholarship_collection = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $scholarship_collection;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
