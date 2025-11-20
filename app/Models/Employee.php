<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class Employee extends Model
{
    protected $guarded = [];
    public function setEmailAttribute($value) {
        $this->attributes['email']=strtolower($value);
    }
      public function setNameAttribute($value) {
        $this->attributes['name']=strtolower($value);
    }
    public function getDobAttribute($value) {
        return date('d M Y', strtotime($value));
    }
    public function getNameAttribute($value) {
        return ucwords($value);
    }
     public function getSalaryAttribute($value) {
        return Number::currency($value,in:'INR');
    }
}
