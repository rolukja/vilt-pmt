<?php

namespace App\Models;

use App\Models\Base\ProjectTask as BaseProjectTask;

class ProjectTask extends BaseProjectTask
{
	protected $fillable = [
		'project_id',
		'task_id'
	];
}
