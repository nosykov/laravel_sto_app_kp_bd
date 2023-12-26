<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CarModel
 * 
 * @property int $id
 * @property int|null $brandid
 * @property string|null $name
 * @property int|null $startyear
 * @property int|null $endyear
 * @property string|null $revision
 * 
 * @package App
 */
class CarModel extends \Illuminate\Database\Eloquent\Model
{
	protected $table = 'model';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		'brandid' => 'int',
		'startyear' => 'int',
		'endyear' => 'int'
	];

	protected $fillable = [
		'brendid',
		'name',
		'startyear',
		'endyear',
		'revision'
	];

	public function brand()
	{
		return $this->belongsTo(Brand::class, 'brandid');
	}

}
