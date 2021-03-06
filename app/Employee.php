<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'phone', 'company_id', 'email'];
    public function company() {
        return $this->belongsTo('App\Company', 'company_id');
    }
}
