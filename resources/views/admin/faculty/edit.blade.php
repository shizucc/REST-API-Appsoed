@extends('layouts.base')
@section('title')
    {{$title}}
@endsection
@section('content')
<div style="width:40%; margin:0 auto; margin-top:80px">
        
        <h1>Form Fakultas</h1>
    <form action="{{route('admin.faculty.update',$faculty->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
            <div class="mb-2">
                <label for="namefaculty" class="form-label"><h4>Nama Fakultas</h4></label>
                <p>Panduan mengisi nama</p>
                <ul>
                    <li>Hanya isi dengan nama lengkap fakultas, huruf kapital disarankan</li>
                    <li>Ex : Fakultas Pertanian, Fakultas Teknik Keren</li>
                </ul>
                <input type="text" name="name" value="{{$faculty->name}}" class="form-control" id="namefaculty" required>
            </div>
            <div class="mb-2">
                <label for="aliasfaculty" class="form-label"><h4>Alias Fakultas</h4></label>
                <p>Panduan mengisi alias</p>
                <ul>
                    <li>Singkatan Fakultas</li>
                    <li>Ex : Fapet, FT, Faperta</li>
                </ul>
                <input type="text" name="alias" value="{{$faculty->alias}}" class="form-control" id="aliasfaculty" required>
            </div>
            
            <div class="mb-2">
                <label for="descriptionKost" class="form-label"><h4>Deskripsi Fakultas</h4></label>
                <p>Panduan Mengisi deskripsi</p>
                <ul>
                    <li>Tulis deskripsi lengkap</li>
                </ul>
                <textarea class="form-control" name="description" id="descriptionKost" rows="3">{{$faculty->description}}</textarea>
            </div>

            <div class="mb-2">
                <label for="locationKost" class="form-label"><h4>Link Google Maps Fakultas -opsional-</h4></label>
                <p>Panduan Mengisi google maps</p>
                <ul>
                    <li>Tulis link yang langsung menuju ke google maps</li>
                </ul>
                <input type="text" name="location" value="{{$faculty->location}}" class="form-control" id="locationKost">
            </div>
            
            <div class="mb-4">
                <label for="imageKost" class="form-label"><h4>Foto Fakultas</h4></label>
                <br>
                @if ($faculty->image != null)
                    <img src="{{asset('storage/images/faculty/'.$faculty->image) }}" alt="" height="100px">
                @endif
                <div>
                    <h5>Ganti Foto :</h5>
                    <input id="imagefaculty" type="file" name="image" accept="image/*"><br>
                </div>
            </div>

            <div class="mb-2">
                <h3>Sosial Media Fakultas -opsional-</h3>
                <p>Panduan mengisi sosmed</p>
                <ul>
                    <li>Isikan yang ada saja</li>
                    <li>Isikan dengan link yang mengarah langsung ke halaman akun sosmed</li>
                </ul>
                <input type="text" name="website_link"  value="{{$faculty->website_link}}" placeholder="Website" class="form-control" >
                <input type="text" name="instagram_link" value="{{$faculty->instagram_link}}" placeholder="instagram" class="form-control" >
                <input type="text" name="youtube_link" value="{{$faculty->youtube_link}}"  placeholder="youtube" class="form-control" >
                <input type="text" name="line_link" value="{{$faculty->line_link}}"  placeholder="line" class="form-control" >
                <input type="text" name="twitter_link" value="{{$faculty->twitter_link}}"  placeholder="twitter" class="form-control" >
                <input type="text" name="spotify_link" value="{{$faculty->spotify_link}}"  placeholder="spotify" class="form-control" >
                <input type="text" name="tiktok_link" value="{{$faculty->tiktok_link}}"  placeholder="tiktok" class="form-control" >
            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-outline-success">Edit Fakultas</button>
            </div>

    </form>
</div>
@endsection