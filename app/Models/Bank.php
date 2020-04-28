<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bank
 * 
 * @property int $id
 * @property int $person_id
 * @property string $code
 * @property string $agency
 * @property string $account
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Person $person
 *
 * @package App\Models
 */
class Bank extends Model
{
	protected $table = 'banks';

	protected $casts = [
		'person_id' => 'int'
	];

	protected $fillable = [
		'person_id',
		'code',
		'agency',
		'account'
	];

	public function person()
	{
		return $this->belongsTo(Person::class);
	}
}
