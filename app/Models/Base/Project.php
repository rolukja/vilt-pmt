<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Task;
use App\Models\Trait\GlobalModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Project
 * 
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Task[] $tasks
 *
 * @package App\Models\Base
 */
class Project extends Model
{
	use GlobalModel;
	protected $table = 'projects';

	public function tasks(): BelongsToMany
	{
		return $this->belongsToMany(Task::class)
					->withPivot('id')
					->withTimestamps();
	}
}
