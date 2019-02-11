<?php

namespace App\Api\v1\Repositories;

use App\Blog;
use Illuminate\Http\Request;
use DB;


class BlogRepository
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
          $blog = Blog::create([

            'author_id' => $request->author_id,
            'picture' => $request->picture,
            'body' => $request->body,
            'title' => $request->title,
            'tags' => $request->tags,
            'summary' => $request->summary,
            'source_name' => $request->source_name,
            'source_url' => $request->source_url,
            'reference' => $request->reference,

          ]);

          if (!$blog) {

            // If User isn't created, rollback database to initial state
            DB::rollback();

            return $blog = "Oops! Sorry there was an error. Please try again";

          }else {

            // If User is created, commit transaction to the database
            DB::commit();

            return $blog;

          }

        } catch (\Exception $e) {

            return "Oops! Sorry there was an error. Please try again";

        }

    }


}

?>
