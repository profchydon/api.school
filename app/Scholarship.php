<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Scholarship extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sponsor_id', 'name', 'faculty', 'college', 'department', 'state', 'website', 'course' , 'cgpa' , 'deadline' , 'school' , 'award' , 'major' , 'country' , 'gender' , 'minimum_subscription_grade' , 'category' , 'dated_deadline',
        'yearly' , 'last_accessed' , 'access_count' , 'amount_award' , 'award_currency' , 'description' , 'approved_at' , 'meta_data' , 'image_url' , 'commence_date',
    ];

}
