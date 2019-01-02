<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\Api\v1\Repositories\StudentRepository;



class StudentController extends Controller
{

  /**
   *
   * @var object
   */
  private $student;


  /**
   * Class constructor
   */
  public function __construct(StudentRepository $student)
  {
      // Inject AuthRepository Class into AuthController
      $this->student = $student;

  }


  /**
   * Create a  new Verification
   *
   * @param object $request
   *
   * @return JSON
   *
   */
  public function create (Request $request)
  {

      try {

          $student = $this->student->create($request);

          // Create a custom array as response
          $response = [
              "status" => "success",
              "code" => 200,
              "message" => "Ok",
              "data" => $student
          ];

          // return the custom in JSON format
          return response()->json($response);

      } catch (\Exception $e) {

        // Create a custom array as response
        $response = [
            "status" => "failed",
            "code" => 404,
            "message" => "Error! Sorry server could not process this request",
            "data" => NULL
        ];

        // return the custom in JSON format
        return response()->json($response);

      }

  }
}
