<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GensoedMerchandise;

class GensoedMerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merchandises = GensoedMerchandise::all();
        return response()->json($merchandises);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $merchandise = GensoedMerchandise::find($id);
        return response()->json($merchandise);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function image(string $img){
        $filePath = public_path('storage/images/gensoedmerch/'.$img);
        if(!file_exists($filePath)){
            abort(404);
        }
        return response()->file($filePath);
    }
}
