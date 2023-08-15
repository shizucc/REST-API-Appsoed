<?php

namespace App\Http\Controllers;

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

    public function image(string $img){
        $filePath = public_path('storage/images/faculty/'.$img);
        if(!file_exists($filePath)){
            abort(404);
        }
        return response()->file($filePath);
    }
}
