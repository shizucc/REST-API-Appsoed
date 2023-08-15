@extends('layouts.base')
@section('title')
    {{$title}}
@endsection
@section('content')
<div style="width:40%; margin:0 auto">
    
        <a type="button" class="btn btn-secondary" href="{{route('admin.comic.index')}}">Kembali</a>
        <h1>Form Edit Komik</h1>
    <form action="{{route('admin.comic.update',$comic->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
            <div class="mb-2">
                <label for="nameComic" class="form-label"><h4>Judul Komik</h4></label>
                <p>Panduan mengisi nama</p>
                <ul>
                    <li>Tulis Judul Lengkap Komik</li>
                    <li>Ex : Naruto Shippuden, Petualangan Medkom</li>
                </ul>
                <input type="text" name="title" value="{{$comic->title}}" class="form-control" id="nameComic" required>
            </div>
            <div class="mb-5">
                <label for="coverComic" class="form-label"><h4>Cover</h4></label>
                <p>Panduan mengisi cover</p>
                <ul>
                    <li>Upload foto yang akan digunakan sebagai cover komik</li>
                </ul>
                <span>Cover Saat ini</span>
                <div style="margin-bottom:10px">
                    <img src="{{asset('storage/images/comic/cover/'.$comic->cover) }}" alt="" height="100px">
                </div>
                <span>Ubah Cover : </span>
                <input id="coverComic" type="file" name="cover" accept="image/*" ><br>
            </div>

            <div class="mb-4">
                <label for="imageComic" class="form-label"><h4>Isi Komik</h4></label>
                <p>Panduan mengisi Isi Komik</p>
                <ul>
                    <li>Komik harus berupa gambar</li>
                    <li>Upload gambar secara urut</li>
                    <li>Jika kelebihan menekan "Tambah Jumlah Isi" tidak masalah</li>
                </ul>
                <div>
                    <h5>Isi Saat Ini : </h5>
                    @if ($comic->comicImages != [])
                    <div class="display: flex; flex-direction:column; margin-bottom:20px; margin-right:20px">
                        @foreach ($comic->comicImages as $image)
                            <div>
                                <img style="height: 150px" src="{{asset('storage/images/comic/content/'.$image->image)}}" alt="{{$image->image}}">
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                
            </div>
            <div>
                <button id="editImageComic" type="button" class="btn btn-primary">Ubah Isi Konten Komik</button>
            </div>
            <div id="editImageComicForm" style="display: none">
                <p>Peringatan : Upload Isi harus dari awal</p>
                <h1>
                    <button type="button" id="plusImageComic" class="btn btn-secondary">Tambah Isi</button>
                    <div id="appendImageComic">
                        
                    </div>
                </h1>
            </div>
            <div style="margin-top: 20px">
                <button type="submit" class="btn btn-success">Update Komik</button>
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
        const toogleEditImageComic = document.getElementById("editImageComic")
        const displayEditImageComicForm = document.getElementById("editImageComicForm")

        toogleEditImageComic.addEventListener("click", function(){
            if (displayEditImageComicForm.style.display === 'none'){
                displayEditImageComicForm.style.display = 'block';
            } 
        })
    </script>
    
@endsection