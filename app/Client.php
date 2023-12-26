<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * 
 * @property int $id
 * @property string|null $address
 * @property string|null $fullname
 * @property string|null $email
 * @property string|null $phone
 * 
 * @property Collection|Car[] $cars
 *
 * @package App
 */
class Client extends Model
{
	protected $table = 'client';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $fillable = [
		'address',
		'fullname',
		'email',
		'phone'
	];

	public function cars()
	{
		return $this->hasMany(Car::class, 'id');
	}
}
