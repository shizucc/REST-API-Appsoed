<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use App\Models\ComicImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $request->validate([
            'title'=> 'required'
        ]);
        $comic = Comic::find($id);
        $comic->title = $request->input('title');

        // Check if has the new cover for update
        if($request->hasFile('cover')){
            // Delete old Cover in storage
            $old_cover_name = $comic->cover;
            $cover_path = public_path('/storage/images/comic/cover/'.$old_cover_name);
            if(File::exists($cover_path)){
                File::delete($cover_path);
            }

            // Store new Cover in storage
            $cover = $request->file('cover');
            $cover_name = str_replace(' ','', $comic->title);
            $path_folder = public_path('/storage/images/comic/cover');

            $file_name = $cover_name.'_'.str_replace(' ','',$cover->getClientOriginalName());
            $cover->move($path_folder,$file_name);

            // Update new cover in database
            $comic->cover = $file_name;
        }

        if($request->hasFile('images')){
            // Delete all comic images in storage that relates to this comic
            $old_images = ComicImage::where('comic_id',$id)->get()->pluck('image')->toArray();

            // Loop for delete all old comic images in storage

            foreach($old_images as $image){
                $old_image_path = public_path('/storage/images/comic/content/' . $image);
                if(File::exists($old_image_path)){
                    File::delete($old_image_path);
                }
            }

            // Delete all old comic images in database
            ComicImage::where('comic_id',$id)->delete();

            // Loop for store all new comic images in storage and database
            $comic_title = str_replace(' ', '', $comic->title);
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

        $comic->save();
        return redirect()->route('admin.comic.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comic = Comic::find($id);
        $comic_images = ComicImage::where('comic_id',$id)->get()->pluck('image')->toArray();
        
        // Delete cover in storage
        if($comic->cover != null){
            $cover_path = public_path('/storage/images/comic/cover/'.$comic->cover);
            if(File::exists($cover_path)){
                File::delete($cover_path);
            }
        }
        // Delete all comic images in storage 
        if($comic_images != []){
            
            foreach($comic_images as $image){
                $image_path = public_path('/storage/images/comic/content/'.$image);
                if(File::exists($image_path)){
                    File::delete($image_path);
                }
            }
            // Delete all comic images in database
            ComicImage::where('comic_id',$id)->delete();
        }
        $comic->delete();
        return redirect()->route('admin.comic.index');
    }
}
