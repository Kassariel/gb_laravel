<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class InfoController extends Controller
{
    public function index()
    {
        return view('info');
    }
    
    public function store(Request $request)
    {
        
        $data = $request->only(['author', 'tel', 'email', 'url', 'description']);
        $info = Info::create($data);
        if($info) {
            return redirect()->route('info')
                ->with('success', 'Запись успешно добавлена');
        }
        
        return back()->with('error', 'Не удалось добавить запись');
    }
    
        
}

