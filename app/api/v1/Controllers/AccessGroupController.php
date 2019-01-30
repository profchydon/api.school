<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\Api\v1\Repositories\AccessGroupRepository;



class AccessGroupController extends Controller
{

  /**
   *
   * @var object
   */
  private $access_group;


  /**
   * Class constructor
   */
  public function __construct(AccessGroupRepository $access_group)
  {
      $this->access_group = $access_group;

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

          $access_group = $this->access_group->create($request);

          // Create a custom array as response
          $response = [
              "status" => "success",
              "code" => 200,
              "message" => "Ok",
              "data" => $access_group
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
