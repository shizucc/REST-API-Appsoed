<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = Faculty::orderBy('id','asc')->get();
        $data = [
            'title' => 'All Faculty',
            'faculties' => Faculty::all()
        ];
        return view('admin.faculty.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Faculty'
        ];
        return view('admin.faculty.create',$data);
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
            $faculty->image = $file_name;
            
        }
        $faculty->save();

        return redirect()->route('admin.faculty.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faculty = Faculty::find($id);
        $data = [
            'title' => 'Edit Faculty',
            'faculty' => $faculty
        ];
        return view('admin.faculty.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:150',
            'alias' => 'required'
        ]);

        $faculty = Faculty::find($id);
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
            // Delete old photo in storage
            $file_name = $faculty->image;
            $file_path = public_path('/storage/images/faculty/'.$file_name);
            if(File::exists($file_path)){
                File::delete($file_path);
            }

            // Add new photo in storage
            $image = $request->file('image');
            $path_folder = public_path('/storage/images/faculty');
            $image_name = str_replace(' ','', $request->input('name'));
            $file_name = $image_name.'_'.str_replace(' ','', $image->getClientOriginalName());
            $image->move($path_folder,$file_name);
            
            // Set new photo value in database
            $faculty->image = $file_name;
        }

        $faculty->save();
        return redirect()->route('admin.faculty.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faculty = Faculty::find($id);

        // Delete Image from storage
        if($faculty->image !=null){
            $file_name = $faculty->image;
            $file_path = public_path('/storage/images/faculty/'.$file_name);
            if(File::exists($file_path)){
                File::delete($file_path);
            }
        }
        $faculty->delete();

        return redirect()->route('admin.faculty.index');
    }
}
