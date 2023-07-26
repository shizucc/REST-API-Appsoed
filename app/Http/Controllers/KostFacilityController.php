<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KostFacility;

class KostFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $KostFacility = KostFacility::all();
        return response()->json($KostFacility, 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kost_id' => 'required|integer',
            'facility' => 'required|max:200',
        ]);
        $KostFacility = KostFacility::create($request->all());
        return response()->json([
            'message'=> "Berhasil menambahkan data fasilitas kost!",
            'kost' => $KostFacility,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $KostFacility = KostFacility::find($id);
        return response()->json($KostFacility, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kost_id' => 'required|integer',
            'facility' => 'required|max:200',
        ]);
        KostFacility::where('id', $id)->update($request->all());
        return response()->json([
            'message'=> "Berhasil mengubah data fasilitas kost!"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KostFacility::destroy($id);
        return response()->json([
            'message'=> "Berhasil menghapus data fasilitas kost!"
        ], 200);
    }
}
