<?php

namespace App\Models;

use App\Models\Base\ProjectTask as BaseProjectTask;

/**
 * 
 *
 * @property int $id
 * @property int $project_id
 * @property int $task_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Project $project
 * @property-read \App\Models\Task $task
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectTask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectTask newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectTask query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectTask whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectTask whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectTask whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectTask whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectTask whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProjectTask extends BaseProjectTask
{
	protected $fillable = [
		'project_id',
		'task_id'
	];
}
