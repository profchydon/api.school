<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Api\v1\Repositories\QuestionSpecRepository;


class QuestionSpecController extends Controller
{
  /**
   * The User
   *
   * @var object
   */
  private $question_spec;

  /**
   * Class constructor
   */
  public function __construct(QuestionSpecRepository $question_spec)
  {

      $this->question_spec = $question_spec;
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
      $question_spec = $this->question_spec->create($request);

      if ($question_spec) {

        // Create a custom array as response
        $response = [
            "status" => "success",
            "code" => 200,
            "message" => "Ok",
            "data" => $question_spec
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
