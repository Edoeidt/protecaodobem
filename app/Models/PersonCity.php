<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PersonCity
 *
 * @property int $id
 * @property int $city_id
 * @property int $person_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property City $city
 * @property Person $person
 *
 * @package App\Models
 */
class PersonCity extends Model
{
	protected $table = 'person_city';

	protected $casts = [
		'city_id' => 'int',
		'person_id' => 'int'
	];

	protected $fillable = [
		'city_id',
		'person_id'
	];

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function person()
	{
		return $this->belongsTo(Person::class);
	}
}
