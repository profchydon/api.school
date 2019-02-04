<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Api\v1\Repositories\UserCardRepository;


class UserCardController extends Controller
{
  /**
   * The User
   *
   * @var object
   */
  private $user_card;

  /**
   * Class constructor
   */
  public function __construct(UserCardRepository $user_card)
  {
      // Inject UserRepository Class into UserController
      $this->user_card = $user_card;
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
      $user_card = $this->user_card->create($request);

      if ($user_card) {

        // Create a custom array as response
        $response = [
            "status" => "success",
            "code" => 200,
            "message" => "Ok",
            "data" => $user_card
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
