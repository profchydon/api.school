<?php

namespace App\Api\v1\Repositories;

use App\Verification;
use App\User;
use Illuminate\Http\Request;
use DB;

/**
 *
 */
class VerificationRepository
{

    public function create($request, $code)
    {

      DB::beginTransaction();
      $verification = Verification::create([
        'code' => $code,
        'email' => $request->email,
      ]);

      if (!$verification) {
        DB::rollback();
      }else {
        DB::commit();
        return $verification;
      }

    }


}



 ?>
