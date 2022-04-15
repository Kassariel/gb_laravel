<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class MainController extends Controller
{
    public function index()
    {
        return view('hello');
    }
    
    public function store(Request $request)
    {
        $data = $request->only(['author', 'description']);
        $feedback = Feedback::create($data);
        if($feedback) {
            return redirect()->route('main')
                ->with('success', 'Отзыв успешно отправлен');
        }
        
        return back()->with('error', 'Не удалось отправить отзыв');
    }
    
    
}

