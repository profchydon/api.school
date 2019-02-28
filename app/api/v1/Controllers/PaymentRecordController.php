<?php

namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Api\v1\Repositories\PaymentRecordRepository;


class PaymentRecordController extends Controller
{
  /**
   * The User
   *
   * @var object
   */
  private $payment_record;

  /**
   * Class constructor
   */
  public function __construct(PaymentRecordRepository $payment_record)
  {

      $this->payment_record = $payment_record;
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
      $payment_record = $this->payment_record->create($request);

      if ($payment_record) {

        // Create a custom array as response
        $response = [
            "status" => "success",
            "code" => 200,
            "message" => "Ok",
            "data" => $payment_record
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
