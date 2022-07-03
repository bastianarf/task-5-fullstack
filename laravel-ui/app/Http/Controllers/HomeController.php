<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $data = Article::paginate(10);

        return view('home', compact('data'));
    }

    public function detail($id)
    {
        $data = Article::findOrFail($id);

        return view('detail', compact('data'));
    }
}
