<?php

namespace App\Api\v1\Repositories;

use App\Contact;
use Illuminate\Http\Request;
use DB;


class ContactRepository
{

    /**
   * Create a  new User
   *
   * @param object $request
   *
   * @return object $user
   *
   */
    public function create($request)
    {

        try {

          // Begin database transaction
          DB::beginTransaction();

          // Create User
          $contact = Contact::create([

            'email' => $request->email,
            'name' => $request->name,
            'subject' => $request->subject,
            'comments' => $request->comments,

          ]);

          if (!$contact) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $contact = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $contact;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
