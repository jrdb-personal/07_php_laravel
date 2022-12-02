<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'birth_date', 
        'gender', 'nationality', 'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public $validationrules = [
        'first_name' => 'required',
        'middle_name' => 'required|max:50',
        'last_name' => 'required|max:50',
        'birth_date' => 'required|date',
        'gender' => 'required',
        'nationality' => 'required'
    ];
    
    public $validationmessages = [
        'first_name.required' => ':attribute is required',
        'middle_name.required' => ':attribute is required',
        'middle_name.max' => ':attribute is more than acceptable length',
        'last_name.required' => ':attribute is z required',
        'last_name.max' => ':attribute is more than acceptable length',
        'birth_date.required' => ':attribute is required',
        'birth_date.date' => ':attribute should be a valid date',
        'gender.required' => ':attribute is required',
        'nationality.required' => ':attribute is required',
    ];
}
