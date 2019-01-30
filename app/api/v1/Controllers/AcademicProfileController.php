<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\Api\v1\Repositories\AcademicProfileRepository;



class AcademicProfileController extends Controller
{

  /**
   *
   * @var object
   */
  private $academic_profile;


  /**
   * Class constructor
   */
  public function __construct(AcademicProfileRepository $academic_profile)
  {
      $this->academic_profile = $academic_profile;

  }


  /**
   *
   * @param object $request
   *
   * @return JSON
   *
   */
  public function create (Request $request)
  {

      try {

          $academic_profile = $this->academic_profile->create($request);

          // Create a custom array as response
          $response = [
              "status" => "success",
              "code" => 200,
              "message" => "Ok",
              "data" => $academic_profile
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
