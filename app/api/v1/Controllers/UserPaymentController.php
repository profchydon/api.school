<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Api\v1\Repositories\UserPaymentRepository;


class UserPaymentController extends Controller
{
  /**
   * The User
   *
   * @var object
   */
  private $user_payment;

  /**
   * Class constructor
   */
  public function __construct(UserPaymentRepository $user_payment)
  {

      $this->user_payment = $user_payment;
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
      $user_payment = $this->user_payment->create($request);

      if ($user_payment) {

        // Create a custom array as response
        $response = [
            "status" => "success",
            "code" => 200,
            "message" => "Ok",
            "data" => $user_payment
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
