<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "address";
    
    protected $fillable = [
        'address_type', 'addres', 'municipality', 'region', 'region',
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
