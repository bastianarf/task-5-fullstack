<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $count = [
            'artikel' => Article::where('user_id', Auth::user()->id)->count(),
            'category' => Category::where('user_id', Auth::user()->id)->count(),
        ];

        return view('dashboard', compact('count'));
    }
}
