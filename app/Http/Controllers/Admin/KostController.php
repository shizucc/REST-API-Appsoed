<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kost;
use App\Models\KostFacility;
use App\Models\KostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class KostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'All kosts',
            'kosts' => Kost::with(['kostFacilities','kostImages'])->orderBy('created_at','desc')->get()
        ];
        return view('admin.kosts.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create kosts'
        ];
        return view('admin.kosts.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kost = new Kost;
        $kost->name = $request->input('name');
        $kost->type = $request->input('type');
        $kost->region = $request->input('region');
        $kost->address = $request->input('address');
        $kost->location = $request->input('location');
        $kost->price_start = $request->input('price_start');
        $kost->owner = $request->input('owner');

        $kost->save();
        
        // Looping untuk menyimpan fasilitas
        foreach($request->input('facilities') as $facility){
            if($facility != null){
                $kost_facility = new KostFacility;
                $kost_facility->facility = $facility;
                $kost_facility->kost_id = $kost->id;

                $kost_facility->save();
            }
        }

        // Lopping untuk menyimpan gamber
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                // // Menyimpan foto ke folder
                // $path_folder = 'storage/images/kosts/'.str_replace(' ','',$kost->name);
                // // $path_image = Storage::url($image->store('images/kosts/'.$path_folder,'public'));

                // $path = public_path($path_folder);
                // $file_name = $image->getClientOriginalName();
                // $image->move($path,$file_name);
                
                // // Menyimpan foto ke database
                // $kost_image = new KostImage;
                // $kost_image->kost_id = $kost->id;
                // $kost_image->image = $path_folder.'/'.$file_name;

                // $kost_image->save();


                // Menyimpan foto ke folder
                $path_folder = public_path('/storage/images/kost');
                $kost_name = str_replace(' ','', Kost::find($kost->id)->name);
                $file_name = $kost_name.'_'. str_replace(' ','', $image->getClientOriginalName());
                $image->move($path_folder, $file_name);

                // Menyimpan foto ke database
                $kost_image = new KostImage;
                $kost_image->kost_id = $kost->id;
                $kost_image->image = $file_name;

                $kost_image->save();
            }
        }
        return redirect()->route('kost.show',$kost->id);

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
    public function destroy($id){
        $kost = Kost::find($id);
        $images = KostImage::where('kost_id',$id)->pluck('image')->toArray();
        
        // Menghapus gambar di file manager
        // foreach($images as $image){
        //     if($image!=null){
        //         $path = public_path($image);
        //         if(File::exists($path)){
        //             File::delete($path);
        //         }
                
        //     }
        // }
        $kost->delete();

        return redirect()->route('admin.kosts.index');
    }
}
