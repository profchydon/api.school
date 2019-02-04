<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Api\v1\Repositories\UserDeviceRepository;


class UserDeviceController extends Controller
{
  /**
   * The User
   *
   * @var object
   */
  private $user_device;

  /**
   * Class constructor
   */
  public function __construct(UserDeviceRepository $user_device)
  {
      // Inject UserRepository Class into UserController
      $this->user_device = $user_device;
      $this->middleware('auth', ['except' => ['create' , 'getDeviceByPlatform']]);

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
      $user_device = $this->user_device->create($request);

      if ($user_device) {

        // Create a custom array as response
        $response = [
            "status" => "success",
            "code" => 200,
            "message" => "Ok",
            "data" => $user_device
        ];

        // return the custom in JSON format
        return response()->json($response);

      }else {
        // code...
      }

      // return the custom in JSON format
      return response()->json($response);

  }


  public function getDeviceByPlatform ($platform)
  {

      $devices = $this->user_device->getDeviceByPlatform($platform);

      if ($devices) {

        // Create a custom array as response
        $response = [
            "status" => "success",
            "code" => 200,
            "message" => "Ok",
            "data" => $devices
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
