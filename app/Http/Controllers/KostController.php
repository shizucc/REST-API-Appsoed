<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Http\Request;

class KostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kosts = Kost::with(['kostFacilities','kostImages'])->orderBy('created_at','desc')->get();
        return response()->json($kosts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:200',
            'type' => 'required|max:200',
            'region' => 'required|max:200',
            'address' => 'required',
            'location' => 'required',
            'price_start' => 'required|integer',
            'owner' => 'required',
        ]);

        $kost = Kost::create($request->all());
        return response()->json([
            'message'=> "Berhasil menambahkan data kost!",
            'kost' => $kost,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kost  = Kost::with(['kostFacilities','kostImages'])->find($id);
        return response()->json($kost);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:200',
            'type' => 'required|max:200',
            'region' => 'required|max:200',
            'address' => 'required',
            'location' => 'required',
            'price_start' => 'required|integer',
            'owner' => 'required',
        ]);
        Kost::where('id', $id)->update($request->all());
        return response()->json([
            'message'=> "Berhasil mengubah data kost!"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kost::destroy($id);
        return response()->json([
            'message'=> "Berhasil menghapus data kost!"
        ], 200);
    }
}
