<?php

namespace App\Api\v1\Repositories;

use App\Scholarship;
use Illuminate\Http\Request;
use DB;


class ScholarshipRepository
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

          // Create scholarship
          $scholarship = Scholarship::create([

            'sponsor_id' => $request->sponsor_id,
            'name' => $request->name,
            'faculty' => $request->faculty,
            'college' => $request->college,
            'department' => $request->department,
            'state' => $request->state,
            'website' => $request->website,
            'course' => $request->course,
            'cgpa' => $request->cgpa,
            'deadline' => $request->deadline,
            'school' => $request->school,
            'award' => $request->award,
            'major' => $request->major,
            'country' => $request->country,
            'gender' => $request->gender,
            'minimum_subscription_grade' => $request->minimum_subscription_grade,
            'category' => $request->category,
            'dated_deadline' => $request->dated_deadline,
            'yearly' => $request->yearly,
            'last_accessed' => $request->last_accessed,
            'access_count' => $request->access_count,
            'amount_award' => $request->amount_award,
            'award_currency' => $request->award_currency,
            'description' => $request->description,
            'approved_at' => $request->approved_at,
            'meta_data' => $request->meta_data,
            'image_url' => $request->image_url,
            'commence_date' => $request->commence_date,

          ]);

          if (!$scholarship) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $scholarship = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $scholarship;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
