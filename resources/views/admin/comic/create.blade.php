@extends('layouts.base')
@section('title')
    {{$title}}
@endsection
@section('content')
<div style="width:40%; margin:0 auto; margin-top:80px">
        
        <h1>Form Komik</h1>
    <form action="{{route('admin.comic.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
            <div class="mb-2">
                <label for="nameComic" class="form-label"><h4>Judul Komik</h4></label>
                <p>Panduan mengisi nama</p>
                <ul>
                    <li>Tulis Judul Lengkap Komik</li>
                    <li>Ex : Naruto Shippuden, Petualangan Medkom</li>
                </ul>
                <input type="text" name="title" class="form-control" id="nameComic" required>
            </div>
            <div class="mb-5">
                <label for="coverComic" class="form-label"><h4>Cover</h4></label>
                <p>Panduan mengisi cover</p>
                <ul>
                    <li>Upload foto yang akan digunakan sebagai cover komik</li>
                </ul>
                <input id="coverComic" type="file" name="cover" accept="image/*" required><br>
            </div>

            <div class="mb-4">
                <label for="imageComic" class="form-label"><h4>Isi Komik</h4></label>
                <p>Panduan mengisi Isi Komik</p>
                <ul>
                    <li>Komik harus berupa gambar</li>
                    <li>Upload gambar secara urut</li>
                    <li>Jika kelebihan menekan "Tambah Jumlah Isi" tidak masalah</li>
                </ul>
                <button id="plusImageComic" type="button" class="btn btn-primary">Tambah Jumlah Isi</button>
                <br>
                <div id="appendImageComic">
                    <input id="imageComic" type="file" name="images[]" multiple><br>
                </div>
            </div>

            <div class="mt-5">
                <button type="submit" class="btn btn-outline-success">Tambah Komik</button>
            </div>

    </form>
</div>
@endsection

@section('extra_scripts')
    <script>
        const buttonAddImageComic = document.getElementById("plusImageComic");
        buttonAddImageComic.addEventListener("click", function(){
            var inputGambar = "<input type='file' name='images[]' multiple><br>";
            $("#appendImageComic").append(inputGambar);
        })
    </script>
    
@endsection