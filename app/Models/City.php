<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * 
 * @property int $id
 * @property string $name
 * @property string $state
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Person[] $people
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class City extends Model
{
	protected $table = 'cities';

	protected $fillable = [
		'name',
		'state'
	];

	public function people()
	{
		return $this->belongsToMany(Person::class, 'person_city')
					->withPivot('id')
					->withTimestamps();
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
