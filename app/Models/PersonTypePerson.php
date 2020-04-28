<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PersonTypePerson
 *
 * @property int $id
 * @property int $type_person_id
 * @property int $person_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Person $person
 * @property TypePerson $type_person
 *
 * @package App\Models
 */
class PersonTypePerson extends Model
{
	protected $table = 'person_type_person';

	protected $casts = [
		'type_person_id' => 'int',
		'person_id' => 'int'
	];

	protected $fillable = [
		'type_person_id',
		'person_id'
	];


	public function person()
	{
		return $this->belongsTo(Person::class);
	}

	public function type_person()
	{
		return $this->belongsTo(TypePerson::class);
	}
}
