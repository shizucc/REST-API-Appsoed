<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = Faculty::all();
        return response()->json($faculties);

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
            'name' => 'required|max:150',
            'alias' => 'required'
        ]);

        $faculty = new Faculty;
        $faculty->name = $request->input('name');
        $faculty->location = $request->input('location');
        $faculty->alias = $request->input('alias');
        $faculty->description = $request->input('description');
        $faculty->instagram_link = $request->input('instagram_link');
        $faculty->youtube_link = $request->input('youtube_link');
        $faculty->line_link = $request->input('line_link');
        $faculty->twitter_link = $request->input('twitter_link');
        $faculty->spotify_link = $request->input('spotify_link');
        $faculty->tiktok_link = $request->input('tiktok_link');
        $faculty->website_link = $request->input('website_link');

        
        if($request->hasFile('image')){
            // Save image into storage
            $image = $request->file('image');

            $path_folder = public_path('/storage/images/faculty');
            $image_name = str_replace(' ','', $request->input('name'));
            $file_name = $image_name.'_'.str_replace(' ','', $image->getClientOriginalName());
            $image->move($path_folder,$file_name);
            
            // save image into database
            $domain = 'localhost:8000';
            $image_url = $domain."/api/faculty/image/".$file_name;
            $faculty->image = $image_url;
            
        }
        $faculty->save();

        return redirect()->route('faculty.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $faculty = Faculty::find($id);
        return response()->json($faculty);
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
        $filePath = public_path('storage/images/faculty/'.$img);
        if(!file_exists($filePath)){
            abort(404);
        }
        return response()->file($filePath);
    }
}
