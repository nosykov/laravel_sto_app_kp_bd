<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Master
 * 
 * @property int $id
 * @property string|null $fullname
 * @property string|null $email
 * @property string|null $phone
 *
 * @package App
 */
class Master extends Model
{
	protected $table = 'masters';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $fillable = [
		'fullname',
		'email',
		'phone'
	];
}
