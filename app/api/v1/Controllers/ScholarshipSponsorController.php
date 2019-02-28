<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Api\v1\Repositories\ScholarshipSponsorRepository;


class ScholarshipSponsorController extends Controller
{
  /**
   * The User
   *
   * @var object
   */
  private $scholarship_sponsor;

  /**
   * Class constructor
   */
  public function __construct(ScholarshipSponsorRepository $scholarship_sponsor)
  {

      $this->scholarship_sponsor = $scholarship_sponsor;
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
      $scholarship_sponsor = $this->scholarship_sponsor->create($request);

      if ($scholarship_sponsor) {

        // Create a custom array as response
        $response = [
            "status" => "success",
            "code" => 200,
            "message" => "Ok",
            "data" => $scholarship_sponsor
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
