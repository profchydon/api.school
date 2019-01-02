<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\Verification;
use App\Api\v1\Repositories\VerificationRepository;
use App\Api\v1\Repositories\UserRepository;

class VerificationController extends Controller
{
    /**
     * The Verification
     *
     * @var object
     */
    private $verification;

    /**
     * The User
     *
     * @var object
     */
    private $user;


    /**
     * Class constructor
     */
    public function __construct(VerificationRepository $verification , UserRepository $user)
    {
        // Inject VeriRepository Class into VerificationController
        $this->verification = $verification;
        $this->user = $user;
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

      // Generate a random code
      $code = rand(10000 , 99999);

        try {

            // Call the create method of VerificationRepository
            $verification = $this->verification->create($request , $code);

            // Create a custom array as response
            $response = [
                "status" => "success",
                "code" => 200,
                "message" => "Ok",
                "data" => $verification
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

?>
