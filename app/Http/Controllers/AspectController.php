<?php

namespace App\Http\Controllers;

use App\Models\Aspect;

class AspectController extends Controller
{
    public function index()
    {
        return view('pages.aspect.index', [
            'aspect' => Aspect::class
        ]);
    }

    public function create()
    {
        return view('pages.aspect.create');
    }

    public function edit($id)
    {
        return view('pages.aspect.edit', compact('id'));
    }
}
