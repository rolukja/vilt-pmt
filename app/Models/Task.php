<?php

namespace App\Models;

use App\Models\Base\Task as BaseTask;

class Task extends BaseTask
{
	protected $fillable = [
		'name',
		'description'
	];
}
