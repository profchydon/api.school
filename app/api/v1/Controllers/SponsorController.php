<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Api\v1\Repositories\SponsorRepository;


class SponsorController extends Controller
{
  /**
   * The User
   *
   * @var object
   */
  private $sponsor;

  /**
   * Class constructor
   */
  public function __construct(SponsorRepository $sponsor)
  {

      $this->sponsor = $sponsor;
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
      $sponsor = $this->sponsor->create($request);

      if ($sponsor) {

        // Create a custom array as response
        $response = [
            "status" => "success",
            "code" => 200,
            "message" => "Ok",
            "data" => $sponsor
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
