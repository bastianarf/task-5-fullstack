<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::get();

        return $this->success($data, "Sukses Ambil Data");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->error('Isi Semua Data', $validator->errors());
        }

        Category::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ]);

        return $this->success([],'Berhasil tambah Kategori Baru');
    }

    public function update(Request $request, $id)
    {
        $data = Category::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->error('Isi Semua Data', $validator->errors());
        }

        $data->update([
            'name' => $request->name,
        ]);

        return $this->success([],'Berhasil edit Kategori');
    }

    public function destroy($id)
    {
        try {
            Category::findOrFail($id)->delete();

            return $this->success([],'Berhasil hapus Kategori');
        } catch (Exception $e) {
            return $this->error('Gagal hapus Kategori',);
        }
    }
}
