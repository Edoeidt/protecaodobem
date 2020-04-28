<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Donation
 * 
 * @property int $id
 * @property int $person_id
 * @property string $type
 * @property string $amount
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Person $person
 *
 * @package App\Models
 */
class Donation extends Model
{
	protected $table = 'donations';

	protected $casts = [
		'person_id' => 'int'
	];

	protected $fillable = [
		'person_id',
		'type',
		'amount'
	];

	public function person()
	{
		return $this->belongsTo(Person::class);
	}
}
