<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('hello');
    }
    
    public function store(Request $request)
    {
        return response()->json(
        $request->only('author', 'description'), 201
        );
    }
}

