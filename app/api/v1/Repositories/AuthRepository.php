<?php

namespace App\Api\v1\Repositories;

use App\User;
use App\Cotenant;
use App\Accept;
use App\Transaction;
use App\Interest;
use App\Visit;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Verification;

/**
 *
 */
class AuthRepository
{

  /**
  * Login User
  *
  *@param $request
  *
  * @return \Illuminate\Http\Response
  */
  public function login($request)
  {

      try {

        $user = User::whereEmail($request->email)->first();

        if (!($user === NULL)) {

          // Check if passwords are equal
          $password = Hash::check($request->password, $user->password);

        }


        if(!$user){

            // If email or password provided does not match
            $user = "Incorrect login details";

            return $user;

        }elseif(!$password){

            // If email or password provided does not match
            $user = "Incorrect login details";

            return $user;
        }
        elseif (!$this->isUserActive($request)) {

            $user = "User's account has not been verified";

            return $user;

        }elseif($user && $password) {

            // Get the current date
            $date = Carbon::now();

            // Create a random key as auth_token for the User
            $hash = Hash::make($date);
            $auth_token = str_random(100);

            // Update auth_token in the user table for the particular user
            User::where('email', $request->email)->update(['auth_token' => $auth_token]);

            $user = User::whereEmail($request->email)->first();

            $data['user'] = $user;

            return $data;

        }


      } catch (\Exception $e) {

          return "Oops! Sorry there was an error. Please try again";

      }

  }

  public function isUserActive($request)
  {

      $user = User::whereEmail($request->email)->first();

      return $user->active ? true : false;

  }

  public function passwordReset($email)
  {

      $emailExist = User::whereEmail($email)->first();

      if (!$emailExist) {

          // If email or password provided does not match
          $passwordReset['message'] = "Email address provided does not exist";
          $passwordReset['status'] = '401';
      }

      if ($emailExist) {

            $code = str_random(7);

            User::whereEmail($email)->update(['remember_token' => $code]);

            $subject = 'Password reset';

            $body = "Hi,
            Click on the link below to reset your password
            http://localhost:8080/api/v1/auth/password_reset?email=$email&code=$code
            ";

            $sendMail = mail($email, $subject, $body , 'noreply@cotenant.com');

            if ($sendMail) {

                $passwordReset['message'] = "A link for password has been sent to your email address.";
                $passwordReset['status'] = '200';

            }

      }

      return $passwordReset;

  }

  //
  // public function changePassword($data)
  // {
  //
  //     User::where('email', $data['email'])->where('password_reset' , $data['code'])->update(['password' => ]);
  //
  // }

}

?>
