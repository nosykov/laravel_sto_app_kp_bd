<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Madework
 * 
 * @property int $MWid
 * @property int|null $CSid
 * @property int|null $worktypeid
 * @property int|null $masterid
 * @property int|null $wastetime
 * @property float|null $price
 * 
 * @property Carservice|null $carservice
 *
 * @package App\Models
 */
class Madework extends Model
{
	protected $table = 'madeworks';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		'CSid' => 'int',
		'worktypeid' => 'int',
		'masterid' => 'int',
		'wastetime' => 'int',
		'price' => 'float'
	];

	protected $fillable = [
		'CSid',
		'worktypeid',
		'masterid',
		'wastetime',
		'price'
	];

	public function carservice()
	{
		return $this->belongsTo(Carservice::class, 'CSid');
	}

	public function master()
	{
		return $this->belongsTo(Master::class, 'masterid');
	}

	public function worktype()
	{
		return $this->belongsTo(Worktype::class, 'worktypeid');
	}
}
