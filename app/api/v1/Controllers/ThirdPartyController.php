<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Api\v1\Repositories\ThirdPartyRepository;


class ThirdPartyController extends Controller
{
  /**
   * The User
   *
   * @var object
   */
  private $third_party;

  /**
   * Class constructor
   */
  public function __construct(ThirdPartyRepository $third_party)
  {

      $this->third_party = $third_party;
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
      $third_party = $this->third_party->create($request);

      if ($third_party) {

        // Create a custom array as response
        $response = [
            "status" => "success",
            "code" => 200,
            "message" => "Ok",
            "data" => $third_party
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
