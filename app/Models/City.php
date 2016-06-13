<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = ['id'];

    public function country()
    {
    	return $this->belongsTo(Country::class);
    }

    public function programs()
    {
    	return $this->belongsToMany(Program::class);
    }
}
