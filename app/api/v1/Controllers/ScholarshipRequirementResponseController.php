<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Api\v1\Repositories\ScholarshipRequirementResponseRepository;


class ScholarshipRequirementResponseController extends Controller
{
  /**
   * The User
   *
   * @var object
   */
  private $scholarship_requirement_response;

  /**
   * Class constructor
   */
  public function __construct(ScholarshipRequirementResponseRepository $scholarship_requirement_response)
  {

      $this->scholarship_requirement_response = $scholarship_requirement_response;
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
      $scholarship_requirement_response = $this->scholarship_requirement_response->create($request);

      if ($scholarship_requirement_response) {

        // Create a custom array as response
        $response = [
            "status" => "success",
            "code" => 200,
            "message" => "Ok",
            "data" => $scholarship_requirement_response
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
