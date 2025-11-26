<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];
    use HasFactory;
    // protected function firstName(): Attribute
    // {
    //     return Attribute::make(
           
    //         set: fn(string $value) => strtolower($value),
    //     );
    // }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
