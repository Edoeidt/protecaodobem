<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TypePerson
 *
 * @property int $id
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|Person[] $people
 *
 * @package App\Models
 */
class TypePerson extends Model
{
	protected $table = 'type_persons';

	protected $fillable = [
		'description'
	];

	public function people()
	{
		return $this->belongsToMany(Person::class)
					->withPivot('id')
					->withTimestamps();
	}
}
