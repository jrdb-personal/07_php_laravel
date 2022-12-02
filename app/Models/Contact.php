<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'type', 'primary', 'number'
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
