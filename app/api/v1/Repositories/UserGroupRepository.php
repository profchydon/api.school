<?php

namespace App\Api\v1\Repositories;

use App\UserGroup;
use Illuminate\Http\Request;
use DB;


class UserGroupRepository
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
          $user_group = UserGroup::create([

            'user_id' => $request->user_id,
            'access_group_id' => $request->access_group_id,
            'permissions' => $request->permissions,

          ]);

          if (!$user_group) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $user_group = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $user_group;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
