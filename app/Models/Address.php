<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'address_type', 'address', 'primary', 'municipality', 'region', 'zip_code',
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
