<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Project;
use App\Models\Task;
use App\Models\Trait\GlobalModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ProjectTask
 * 
 * @property int $id
 * @property int $project_id
 * @property int $task_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Project $project
 * @property Task $task
 *
 * @package App\Models\Base
 */
class ProjectTask extends Model
{
	use GlobalModel;
	protected $table = 'project_task';

	protected $casts = [
		'project_id' => 'int',
		'task_id' => 'int'
	];

	public function project(): BelongsTo
	{
		return $this->belongsTo(Project::class);
	}

	public function task(): BelongsTo
	{
		return $this->belongsTo(Task::class);
	}
}
