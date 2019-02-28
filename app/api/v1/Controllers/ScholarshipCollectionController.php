<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Api\v1\Repositories\ScholarshipCollectionRepository;


class ScholarshipCollectionController extends Controller
{
  /**
   * The User
   *
   * @var object
   */
  private $scholarship_collection;

  /**
   * Class constructor
   */
  public function __construct(ScholarshipCollectionRepository $scholarship_collection)
  {

      $this->scholarship_collection = $scholarship_collection;
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
      $scholarship_collection = $this->scholarship_collection->create($request);

      if ($scholarship_collection) {

        // Create a custom array as response
        $response = [
            "status" => "success",
            "code" => 200,
            "message" => "Ok",
            "data" => $scholarship_collection
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
