<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = kategori::latest()->get();
        $response = [
            'succes' => true,
            'messages' => 'Daftar Kategori',
            'data' => $kategori,
        ];
        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $kategori = new kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return response()->json([
            'success' => true,
            'message' => 'data berhasil di simpan',
        ], 201);
    }

    public function show($id)
    {
        $kategori = kategori::find($id);
        if ($kategori) {
            return response()->json([
                'success' => true,
                'message' => 'detail kategori berhasil di simpan',
                'data' => $kategori,
            ], 200);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'data tidak ditemukan',
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $kategori = kategori::find($id);
        if ($kategori) {
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->save();
            return response()->json([
                'success' => true,
                'message' => 'detail kategori berhasil di edit',
            ]);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'data' .$kategori->nama_kategori .'berhasil dihapus'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $kategori = kategori::find($id);
        if ($kategori) {
            $kategori->delete();
            return response()->json([
                'success' => true,
                'message' => 'detail kategori berhasil di hapus',
            ], 200);
        }else {
            return response()->json([
                'success' => true,
                'message' => 'data tidak ditemukan',
            ], 404);
        }
    }
}
