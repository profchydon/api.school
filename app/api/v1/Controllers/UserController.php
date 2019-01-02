<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Api\v1\Repositories\UserRepository;
use App\Api\v1\Repositories\VerificationRepository;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
  /**
   * The User
   *
   * @var object
   */
  private $user;

  /**
   * The Verification
   *
   * @var object
   */
  private $verification;

  /**
   * Class constructor
   */
  public function __construct(UserRepository $user , VerificationRepository $verification)
  {
      // Inject UserRepository Class into UserController
      $this->user = $user;
      $this->verification = $verification;
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
      $user = $this->user->create($request);

      if ($user == "Email address already exist" || $user == "Phone number already exist") {

          // Create a custom array as response
          $response = [
              "status" => "failed",
              "code" => 409,
              "message" => $user,
              "data" => NULL
          ];

      }else{

          // Generate a random code for verification
          $code = rand(1000 , 9999);
          $code = (int)$code;

          // Save verification code and email to verification table
          $verification = $this->verification->create($request, $code);

          $data['user'] = $user;
          $data['verification'] = $verification;

          // Create a custom array as response
          $response = [
              "status" => "success",
              "code" => 201,
              "message" => "User created successfully",
              "data" => $data
          ];


      }

      // return the custom in JSON format
      return response()->json($response);

  }



}

?>
