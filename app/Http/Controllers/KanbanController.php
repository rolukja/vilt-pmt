<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class KanbanController extends Controller
{
    public function index(Request $request, int $pID): \Inertia\Response
    {
        $request->merge(['pID' => $pID]);

        $request->validate([
            'pID' => 'required|integer|exists:projects,id',
        ]);

        return Inertia::render('Kanban/Index');
    }
}
