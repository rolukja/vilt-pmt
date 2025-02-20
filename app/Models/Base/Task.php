<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Project;
use App\Models\Trait\GlobalModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Task
 * 
 * @property int $id
 * @property int|null $user_id
 * @property string $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 * @property Collection|Project[] $projects
 *
 * @package App\Models\Base
 */
class Task extends Model
{
	use GlobalModel;
	protected $table = 'tasks';

	protected $casts = [
		'user_id' => 'int'
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function projects(): BelongsToMany
	{
		return $this->belongsToMany(Project::class)
					->withPivot('id')
					->withTimestamps();
	}
}
