<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'landline', 'mobile', 'alternate_email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public $validationrules = [

    ];
    
    public $validationmessages = [

    ];
}
