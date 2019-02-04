<?php

namespace App\Api\v1\Repositories;

use App\UserDevice;
use Illuminate\Http\Request;
use DB;


class UserDeviceRepository
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
          $user_device = UserDevice::create([

            'user_id' => $request->user_id,
            'token' => $request->token,
            'platform' => $request->platform,
            'lng' => $request->lng,
            'lat' => $request->lat,

          ]);

          if (!$user_device) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $user_device = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $user_device;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }

    public function getDeviceByPlatform($platform)
    {
        $devices = UserDevice::where('platform' , $platform)->get();
        return $devices;
    }


}

?>
