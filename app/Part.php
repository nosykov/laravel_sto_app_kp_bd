<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Part
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $pcategory
 * @property int|null $prest
 * @property float|null $pcurprice
 *
 * @package App\Models
 */
class Part extends Model
{
	protected $table = 'parts';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		'prest' => 'int',
		'pcurprice' => 'float'
	];

	protected $fillable = [
		'name',
		'pcategory',
		'prest',
		'pcurprice'
	];
}
