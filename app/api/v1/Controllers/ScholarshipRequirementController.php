<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Api\v1\Repositories\ScholarshipRequirementRepository;


class ScholarshipRequirementController extends Controller
{
  /**
   * The User
   *
   * @var object
   */
  private $scholarship_requirement;

  /**
   * Class constructor
   */
  public function __construct(ScholarshipRequirementRepository $scholarship_requirement)
  {

      $this->scholarship_requirement = $scholarship_requirement;
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
      $scholarship_requirement = $this->scholarship_requirement->create($request);

      if ($scholarship_requirement) {

        // Create a custom array as response
        $response = [
            "status" => "success",
            "code" => 200,
            "message" => "Ok",
            "data" => $scholarship_requirement
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
