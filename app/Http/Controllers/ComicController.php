<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::with('comicImages')->get();
        return response()->json($comics);
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
        $request->validate([
            'title' => 'required',
            'cover' => 'required',
        ]);
        $comic = new Comic;
        $comic->title = $request->input('title');
        
        if($request->hasFile('cover')){
            // Save image into storage
            $image = $request->file('cover');

            $path_folder = public_path('/storage/images/comic');
            $image_name = str_replace(' ','', $request->input('title'));
            $file_name = $image_name.'_'.str_replace(' ','', $image->getClientOriginalName());
            $image->move($path_folder,$file_name);
            
            // save image into database
            $comic->cover = $file_name;
            
        }
        $comic->save();
        return redirect('admin.comic.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comic = Comic::with('comicImages')->find($id);
        return response()->json($comic);
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
        $filePath = public_path('storage/images/comic/'.$img);
        if(!file_exists($filePath)){
            abort(404);
        }
        return response()->file($filePath);
    }
    

}
