<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Api\v1\Repositories\UserProfileRepository;


class UserProfileController extends Controller
{
  /**
   * The User
   *
   * @var object
   */
  private $user_profile;

  /**
   * Class constructor
   */
  public function __construct(UserProfileRepository $user_profile)
  {

      $this->user_profile = $user_profile;
      $this->middleware('auth', ['except' => ['create']]);

      $auth = Auth::user();

  }

  /**
   * Create a  new User
   *
   * @param object $request
   *
   * @return JSON
   *
   */
  public function create (Request $request)
  {
      // Call the create method of UserRepository
      $user_profile = $this->user_profile->create($request);

      if ($user_profile) {

        // Create a custom array as response
        $response = [
            "status" => "success",
            "code" => 200,
            "message" => "Ok",
            "data" => $user_profile
        ];

        // return the custom in JSON format
        return response()->json($response);

      }else {
        // code...
      }

      // return the custom in JSON format
      return response()->json($response);

  }




}

?>
