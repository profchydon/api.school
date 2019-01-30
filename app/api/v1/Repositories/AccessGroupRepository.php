<?php

namespace App\Api\v1\Repositories;

use App\User;
use App\AccessGroup;
use Illuminate\Http\Request;
use DB;

/**
 *
 */
class AccessGroupRepository
{

    public function create($request)
    {

        try {

          // Begin database transaction
          DB::beginTransaction();

          // Create User
          $access_group = AccessGroup::create([
            'name' => $request->name,
            'resources' => $request->resources,
            'editable' => $request->editable,
          ]);

          if (!$access_group) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $access_group = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $access_group;

          }

        } catch (\Exception $e) {

        }

    }


}



 ?>
