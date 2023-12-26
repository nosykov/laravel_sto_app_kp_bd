<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Carservice
 * 
 * @property int $CSid
 * @property int|null $carid
 * @property Carbon|null $startdate
 * @property Carbon|null $enddate
 * @property float|null $price
 * 
 * @property Car|null $car
 * @property Collection|Madework[] $madeworks
 *
 * @package App\Models
 */
class Carservice extends Model
{
	protected $table = 'carservice';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		'carid' => 'int',
		'startdate' => 'datetime',
		'enddate' => 'datetime',
		'price' => 'float'
	];

	protected $fillable = [
		'carid',
		'startdate',
		'enddate',
		'price'
	];

	public function car()
	{
		return $this->belongsTo(Car::class, 'carid');
	}

	public function madeworks()
	{
		return $this->hasMany(Madework::class, 'id');
	}

	public function wasteparts()
	{
		return $this->hasMany(Wastepart::class, 'id');
	}
}
