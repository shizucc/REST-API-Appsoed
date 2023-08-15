<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GensoedMerchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GensoedMerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merchandises = GensoedMerchandise::orderBy('id','desc')->get();
        $data = [
            'title'=> "All Gensoed Merch",
            'merchandises' => $merchandises
        ];
        return view('admin.gensoedmerch.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Gensoed Merch'
        ];
        return view('admin.gensoedmerch.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price_start' => 'required|integer',
            'product_link' => 'required'
        ]);

        $merchandise = new GensoedMerchandise;
        $merchandise->name = $request->input('name');
        $merchandise->price_start = $request->input('price_start');
        $merchandise->price_end = $request->input('price_end');
        $merchandise->product_link = $request->input('product_link');


        // Save cover image into storage
        if($request->hasFile('image')){
            $image = $request->file('image');

            $path_folder = public_path('/storage/images/gensoedmerch');
            $image_name = str_replace(' ','', $request->input('name'));
            $file_name = $image_name.'_'.str_replace(' ','', $image->getClientOriginalName());
            $image->move($path_folder,$file_name);
            
            // save image into database
            $merchandise->image = $file_name;
        }
        $merchandise->save();
        return redirect()->route('admin.gensoedmerch.index');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $merchandise = GensoedMerchandise::find($id);
        $data = [
            'title' => 'Edit Gensoed Merch',
            'merchandise' => $merchandise
        ];
        return view('admin.gensoedmerch.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'price_start' => 'required|integer',
            'product_link' => 'required'
        ]);
        $merchandise = GensoedMerchandise::find($id);
        $merchandise->name = $request->input('name');
        $merchandise->price_start = $request->input('price_start');
        $merchandise->price_end = $request->input('price_end');
        $merchandise->product_link = $request->input('product_link');

        if($request->hasFile('image')){
            // Delete old product image in storage
            $old_image = $merchandise->image;
            $old_image_path = public_path('/storage/images/gensoedmerch/'.$old_image);
            if(File::exists($old_image_path)){
                File::delete($old_image_path);
            }

            // Save new image in storage
            $image = $request->file('image');

            $path_folder = public_path('/storage/images/gensoedmerch');
            $image_name = str_replace(' ','', $request->input('name'));
            $file_name = $image_name.'_'.str_replace(' ','', $image->getClientOriginalName());
            $image->move($path_folder,$file_name);

            $merchandise->image = $file_name;
        }

        $merchandise->save();
        return redirect()->route('admin.gensoedmerch.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $merchandise = GensoedMerchandise::find($id);
        // Delete image of merch from storage
        if($merchandise->image != null){
            $image_path = public_path('/storage/images/gensoedmerch/'.$merchandise->image);
            if(File::exists($image_path)){
                File::delete($image_path);
            }
        }
        $merchandise->delete();
        return redirect()->route('admin.gensoedmerch.index');
    }
}
