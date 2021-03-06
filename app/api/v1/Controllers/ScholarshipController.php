<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Api\v1\Repositories\ScholarshipRepository;


class ScholarshipController extends Controller
{
  /**
   * The User
   *
   * @var object
   */
  private $scholarship;

  /**
   * Class constructor
   */
  public function __construct(ScholarshipRepository $scholarship)
  {

      $this->scholarship = $scholarship;
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
      $scholarship = $this->scholarship->create($request);

      if ($scholarship) {

        // Create a custom array as response
        $response = [
            "status" => "success",
            "code" => 200,
            "message" => "Ok",
            "data" => $scholarship
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
