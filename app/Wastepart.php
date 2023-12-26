<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Wastepart
 * 
 * @property int $WPid
 * @property int|null $CSid
 * @property int|null $partid
 * @property int|null $quantity
 * @property float|null $price
 *
 * @package App\Models
 */
class Wastepart extends Model
{
	protected $table = 'wasteparts';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		'CSid' => 'int',
		'partid' => 'int',
		'quantity' => 'int',
		'price' => 'float'
	];

	protected $fillable = [
		'CSid',
		'partid',
		'quantity',
		'price'
	];
	
	public function part()
	{
		return $this->belongsTo(Part::class, 'partid');
	}
}
