<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
   	protected $guarded = ['id'];

   	public function countries()
   	{
   		return $this->belongsToMany(Country::class);
   	}

   	public function cities()
   	{
   		return $this->belongsToMany(City::class);
   	}

   	public function subjects()
   	{
   		return $this->belongsToMany(Subject::class);
   	}

   	public function terms()
   	{
   		return $this->belongsToMany(Term::class);
   	}
}
