<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	protected $table = 'brands';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'website'
	];
}
