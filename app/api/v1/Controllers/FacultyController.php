<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Api\v1\Repositories\FacultyRepository;


class FacultyController extends Controller
{
  /**
   * The User
   *
   * @var object
   */
  private $faculty;

  /**
   * Class constructor
   */
  public function __construct(FacultyRepository $faculty)
  {

      $this->faculty = $faculty;
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
      $faculty = $this->faculty->create($request);

      if ($faculty) {

        // Create a custom array as response
        $response = [
            "status" => "success",
            "code" => 200,
            "message" => "Ok",
            "data" => $faculty
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
