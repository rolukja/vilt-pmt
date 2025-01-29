<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminOverviewController extends Controller
{

    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Overview/Index');
    }

}
