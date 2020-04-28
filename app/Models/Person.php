<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Person
 *
 * @property int $id
 * @property string $name
 * @property string $contact_name
 * @property string $national_registry
 * @property string $phone
 * @property string $email
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|Bank[] $banks
 * @property Collection|Donation[] $donations
 * @property Collection|City[] $cities
 * @property Collection|PersonTypePerson[] $person_type_people
 *
 * @package App\Models
 */
class Person extends Model
{
	protected $table = 'persons';

	protected $fillable = [
		'name',
		'contact_name',
		'national_registry',
		'phone',
		'email',
		'work'
	];

	public function banks()
	{
		return $this->hasMany(Bank::class);
	}

	public function donations()
	{
		return $this->hasMany(Donation::class);
	}

	public function cities()
	{
		return $this->belongsToMany(City::class, 'person_city')
					->withPivot('id')
					->withTimestamps();
	}

	public function person_type_people()
	{
		return $this->hasMany(PersonTypePerson::class);
	}
}
