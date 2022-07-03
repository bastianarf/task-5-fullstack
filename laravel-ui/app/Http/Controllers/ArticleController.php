<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Article::where('user_id', Auth::user()->id)->get();

        return view('article.index', compact('data'));
    }

    public function create()
    {
        $kategori = Category::get();

        return view('article.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:5120',
            'category' => 'required|numeric',
        ]);

        $nama_file = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/images'), $nama_file);

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $nama_file,
            'category_id' => $request->category,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('article.index')
            ->with([
                'jenis' => 'success',
                'pesan' => 'Berhasil menambah data.'
            ]);
    }

    public function edit($id)
    {
        $data = Article::findOrFail($id);
        $kategori = Category::get();
        return view('article.edit', compact('data','kategori'));
    }

    public function update(Request $request, $id)
    {
        $data = Article::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:5120',
            'category' => 'required|numeric',
        ]);

        $data->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category,
        ]);

        if ($request->hasFile('image')) {
            $nama_file = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/images'), $nama_file);

            $data->update([
                'image' => $nama_file,
            ]);
        }

        return redirect()->route('article.index')
            ->with([
                'jenis' => 'success',
                'pesan' => 'Berhasil mengubah data.'
            ]);
    }

    public function destroy($id)
    {
        try {
            Article::findOrFail($id)->delete();

            return redirect()->route('article.index')
            ->with([
                'jenis' => 'success',
                'pesan' => 'Berhasil menghapus data.'
            ]);
        } catch (\Exception $th) {
            return redirect()->route('article.index')
            ->with([
                'jenis' => 'danger',
                'pesan' => 'Gagal menghapus data.'
            ]);
        }
    }
}
