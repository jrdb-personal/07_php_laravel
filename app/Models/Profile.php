<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'birthdate', 
        'gender', 'nationality', 'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public $validationrules = [
        'name' => 'required|unique:users',
        'birthdate' => 'required|date',
    ];
    
    public $validationmessages = [
        'name.required' => ':attribute is required',
        'name.unique' => 'The value :input for :attribute already exists',
        'birthdate.required' => ':attribute is required',
        'birthdate.date' => ':attribute should be a valid date',
    ];
}
