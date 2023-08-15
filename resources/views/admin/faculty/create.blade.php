@extends('layouts.base')
@section('title')
    {{$title}}
@endsection
@section('content')
<div style="width:40%; margin:0 auto">
        <a type="button" class="btn btn-secondary" href="{{route('admin.kosts.index')}}">Kembali</a>
        <h1>Form Fakultas</h1>
    <form action="{{route('admin.faculty.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
            <div class="mb-2">
                <label for="namefaculty" class="form-label"><h4>Nama Fakultas</h4></label>
                <p>Panduan mengisi nama</p>
                <ul>
                    <li>Hanya isi dengan nama lengkap fakultas, huruf kapital disarankan</li>
                    <li>Ex : Fakultas Pertanian, Fakultas Teknik Keren</li>
                </ul>
                <input type="text" name="name" class="form-control" id="namefaculty" required>
            </div>
            <div class="mb-2">
                <label for="aliasfaculty" class="form-label"><h4>Alias Fakultas</h4></label>
                <p>Panduan mengisi alias</p>
                <ul>
                    <li>Singkatan Fakultas</li>
                    <li>Ex : Fapet, FT, Faperta</li>
                </ul>
                <input type="text" name="alias" class="form-control" id="aliasfaculty" required>
            </div>
            
            <div class="mb-2">
                <label for="descriptionFaculty" class="form-label"><h4>Deskripsi Fakultas</h4></label>
                <p>Panduan Mengisi deskripsi</p>
                <ul>
                    <li>Tulis deskripsi lengkap</li>
                </ul>
                <textarea class="form-control" name="description" id="descriptionFaculty" rows="3"></textarea>
            </div>

            <div class="mb-2">
                <label for="locationFaculty" class="form-label"><h4>Link Google Maps Fakultas -opsional-</h4></label>
                <p>Panduan Mengisi google maps</p>
                <ul>
                    <li>Tulis link yang langsung menuju ke google maps</li>
                </ul>
                <input type="text" name="location" class="form-control" id="locationFaculty">
            </div>
            
            <div class="mb-4">
                <label for="imageFaculty" class="form-label"><h4>Foto Fakultas</h4></label>
                <br>
                <div>
                    <input id="imagefaculty" type="file" name="image" accept="image/*" required><br>
                </div>
            </div>

            <div class="mb-2">
                <h3>Sosial Media Fakultas -opsional-</h3>
                <p>Panduan mengisi sosmed</p>
                <ul>
                    <li>Isikan yang ada saja</li>
                    <li>Isikan dengan link yang mengarah langsung ke halaman akun sosmed</li>
                </ul>
                <input type="text" name="website_link" placeholder="Website" class="form-control" >
                <input type="text" name="instagram_link" placeholder="instagram" class="form-control" >
                <input type="text" name="youtube_link" placeholder="youtube" class="form-control" >
                <input type="text" name="line_link" placeholder="line" class="form-control" >
                <input type="text" name="twitter_link" placeholder="twitter" class="form-control" >
                <input type="text" name="spotify_link" placeholder="spotify" class="form-control" >
                <input type="text" name="tiktok_link" placeholder="tiktok" class="form-control" >
            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-outline-success">Tambah Fakultas</button>
            </div>

    </form>
</div>
@endsection