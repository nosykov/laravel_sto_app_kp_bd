<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Worktype
 * 
 * @property int $worktypeid
 * @property string|null $worktypename
 * @property float|null $cur_price
 *
 * @package App\Models
 */
class Worktype extends Model
{
	protected $table = 'worktype';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		'cur_price' => 'float'
	];

	protected $fillable = [
		'worktypename',
		'cur_price'
	];
}
