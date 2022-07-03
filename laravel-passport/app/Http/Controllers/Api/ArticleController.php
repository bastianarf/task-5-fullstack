<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index()
    {
        $data = Article::paginate(10);

        return $this->success($data, "Sukses Ambil Data");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:5120',
            'category_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->error('Isi Semua Data', $validator->errors());
        }

        $nama_file = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/images'), $nama_file);

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $nama_file,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id
        ]);

        return $this->success([],'Berhasil tambah Artikel Baru');
    }

    public function update(Request $request, $id)
    {
        $data = Article::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:5120',
            'category_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->error('Isi Semua Data', $validator->errors());
        }

        $data->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
        ]);

        if ($request->hasFile('image')) {
            $nama_file = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/images'), $nama_file);

            $data->update([
                'image' => $nama_file,
            ]);
        }

        return $this->success([],'Berhasil edit Artikel');
    }

    public function destroy($id)
    {
        try {
            Article::findOrFail($id)->delete();

            return $this->success([],'Berhasil hapus Artikel');
        } catch (Exception $e) {
            return $this->error('Gagal hapus Artikel',);
        }
    }

    public function show($id)
    {
        $data = Article::findOrFail($id);

        return $this->success($data, "Sukses Ambil Data Artikel");
    }
}
