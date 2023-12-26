<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Car
 * 
 * @property int $carid
 * @property int|null $clientid
 * @property int|null $modelid
 * @property string|null $color
 * @property int|null $mileage
 * @property int|null $prodyear
 * @property string|null $regnumber
 * 
 * @property Client|null $client
 * @property Model|null $carmodel
 * @property Collection|Carservice[] $carservices
 *
 * @package App
 */
class Car extends Model
{
	protected $table = 'car';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		'clientid' => 'int',
		'modelid' => 'int',
		'mileage' => 'int',
		'prodyear' => 'int'
	];

	protected $fillable = [
		'clientid',
		'modelid',
		'color',
		'mileage',
		'prodyear',
		'regnumber'
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'clientid');
	}

	public function carmodel()
	{
		return $this->belongsTo(CarModel::class, 'modelid');
	}

	public function carservices()
	{
		return $this->hasMany(Carservice::class, 'carid');
	}
}
