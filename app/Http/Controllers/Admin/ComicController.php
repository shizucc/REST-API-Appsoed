<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use App\Models\ComicImage;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::with('comicImages')->get();
        $data = [
            'title' => 'All Comic',
            'comics' => $comics
        ];
        return view('admin.comic.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => "Create Comic"
        ];
        return view('admin.comic.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $comic = new Comic;
        $comic->title = $request->input('title');

        if($request->hasFile('cover')){
            // Save cover image into storage
            $image = $request->file('cover');

            $path_folder = public_path('/storage/images/comic/cover');
            $image_name = str_replace(' ','', $request->input('title'));
            $file_name = $image_name.'_'.str_replace(' ','', $image->getClientOriginalName());
            $image->move($path_folder,$file_name);
            
            // save image into database
            $comic->cover = $file_name;
            
        }
        $comic->save();
        
        // Save content comic into storage
        if($request->hasFile('images')){
            $comic_title = str_replace(' ', '', Comic::find($comic->id)->title);
            $path_folder = public_path('/storage/images/comic/content');
            foreach ($request->file('images') as $image) {
                $img_name = $comic_title.'_'.str_replace(' ','', $image->getClientOriginalName());
                $image->move($path_folder,$img_name);

                $comic_image = new ComicImage;
                $comic_image->comic_id = $comic->id;
                $comic_image->image = $img_name;

                $comic_image->save();
            }

        }
        return redirect()->route('admin.comic.index');
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
        $comic = Comic::with('comicImages')->find($id);
        $data = [
            'title' => "Edit Comic",
            'comic' => $comic
        ];
        return view('admin.comic.edit', $data);
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
