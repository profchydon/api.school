<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\Api\v1\Repositories\FundingRequestRepository;



class FundingRequestController extends Controller
{

  /**
   *
   * @var object
   */
  private $funding_request;


  /**
   * Class constructor
   */
  public function __construct(FundingRequestRepository $funding_request)
  {
      // Inject AuthRepository Class into AuthController
      $this->funding_request = $funding_request;

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

          $funding_request = $this->funding_request->create($request);

          // Create a custom array as response
          $response = [
              "status" => "success",
              "code" => 200,
              "message" => "Ok",
              "data" => $funding_request
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
