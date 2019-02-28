<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Api\v1\Repositories\OauthRepository;


class OauthController extends Controller
{
  /**
   * The User
   *
   * @var object
   */
  private $oauth;

  /**
   * Class constructor
   */
  public function __construct(OauthRepository $oauth)
  {

      $this->oauth = $oauth;
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
      $oauth = $this->oauth->create($request);

      if ($oauth) {

        // Create a custom array as response
        $response = [
            "status" => "success",
            "code" => 200,
            "message" => "Ok",
            "data" => $oauth
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
