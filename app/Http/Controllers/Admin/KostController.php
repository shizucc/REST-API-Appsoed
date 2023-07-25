<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kost;
use App\Models\KostFacility;
use App\Models\KostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'All kosts'
        ];
        return view('admin.kosts.index',$data);
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
                $path_folder = str_replace(' ','',$kost->name);
                $path_image = Storage::url($image->store('images/kosts/'.$path_folder,'public'));
                $kost_image = new KostImage;
                $kost_image->image = $path_image;
                $kost_image->kost_id = $kost->id;

                $kost_image->save();
            }
        }
        return redirect()->route('kosts.show',$kost->id);

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
    public function destroy(string $id)
    {
        //
    }
}
