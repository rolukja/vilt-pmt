<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class KanbanController extends Controller
{
    public function index(): \Inertia\Response
    {

        //https://vivify-ideas.github.io/vue-draggable/example/#working-with-reactive-data

//        $request->merge(['pID' => $pID]);
//
//        $request->validate([
//            'pID' => 'required|integer|exists:projects,id',
//        ]);

        return Inertia::render('Kanban/Index');
    }
}
