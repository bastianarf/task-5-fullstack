<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Category::get();

        return view('category.index', compact('data'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('category.index')
            ->with([
                'jenis' => 'success',
                'pesan' => 'Berhasil menambah data.'
            ]);
    }

    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view('category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Category::findOrFail($id);

        $request->validate([
            'name' => 'required'
        ]);

        $data->update([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')
            ->with([
                'jenis' => 'success',
                'pesan' => 'Berhasil mengubah data.'
            ]);
    }

    public function destroy($id)
    {
        try {
            Category::findOrFail($id)->delete();

            return redirect()->route('category.index')
            ->with([
                'jenis' => 'success',
                'pesan' => 'Berhasil menghapus data.'
            ]);
        } catch (\Exception $th) {
            return redirect()->route('category.index')
            ->with([
                'jenis' => 'danger',
                'pesan' => 'Gagal menghapus data.'
            ]);
        }
    }
}
