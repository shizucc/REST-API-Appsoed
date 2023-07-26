<?php

namespace App\Http\Controllers;

use App\Models\KostImage;
use Illuminate\Http\Request;

class KostImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $KostImage = KostImage::all();
        return response()->json($KostImage, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kost_id' => 'required|integer',
            'image' => 'required|max:200',
        ]);
        $KostImage =KostImage::create($request->all());
        return response()->json([
            'message'=> "Berhasil menambahkan data image kost!",
            'kost' => $KostImage,
        ], 200);
    }

    public function show($id){
        
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kost_id' => 'required|integer',
            'image' => 'required|max:200',
        ]);
        KostImage::where('id', $id)->update($request->all());
        return response()->json([
            'message'=> "Berhasil mengubah data image kost!"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KostImage::destroy($id);
        return response()->json([
            'message'=> "Berhasil menghapus data image kost!"
        ], 200);
    }
}
