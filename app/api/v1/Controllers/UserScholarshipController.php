<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Api\v1\Repositories\UserScholarshipRepository;


class UserScholarshipController extends Controller
{
  /**
   * The User
   *
   * @var object
   */
  private $user_scholarship;

  /**
   * Class constructor
   */
  public function __construct(UserScholarshipRepository $user_scholarship)
  {

      $this->user_scholarship = $user_scholarship;
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
      $user_scholarship = $this->user_scholarship->create($request);

      if ($user_scholarship) {

        // Create a custom array as response
        $response = [
            "status" => "success",
            "code" => 200,
            "message" => "Ok",
            "data" => $user_scholarship
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
