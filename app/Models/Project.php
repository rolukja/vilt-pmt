<?php

namespace App\Models;

use App\Models\Base\Project as BaseProject;

class Project extends BaseProject
{
	protected $fillable = [
		'name',
		'description'
	];
}
