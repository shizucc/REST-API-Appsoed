<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\KostFacility;
use App\Models\KostImage;
use Illuminate\Http\Request;

class KostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kosts = Kost::with(['kostFacilities','kostImages'])->get();
        return response()->json($kosts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
