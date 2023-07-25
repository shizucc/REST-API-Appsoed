@extends('layouts.base')
@section('title')
    {{$title}}
@endsection
@section('content')
<div style="width:40%; margin:0 auto">
        <h1>Form Kost</h1>
        <form action="" method="post">
        <div class="mb-1">
            <label for="nameKost" class="form-label">Nama Kost</label>
            <input type="text" name="name" class="form-control" id="nameKost" required>
        </div>
        <div class="mb-1">
            <label for="typeKost" class="form-label">Tipe Kost</label>
            <select id="typeKost" name="type" class="form-select" aria-label="Default select example">
                <option value="l" selected>Laki-Laki</option>
                <option value="p">Perempuan</option>
                <option value="campur">Campur</option>
            </select>
        </div>
        <div class="mb-1">
            <label for="regionKost" class="form-label">Kabupaten Kost</label>
            <input type="text" name="region" class="form-control" id="regionKost" required>
        </div>
        <div class="mb-1">
            <label for="addressKost" class="form-label">Alamat Kost</label>
            <textarea class="form-control" name="address" id="addressKost" rows="3"></textarea>
        </div>
        <div class="mb-1">
            <label for="gmapsKost" class="form-label">Link Google Maps Kost</label>
            <input type="text" name="location" class="form-control" id="regionKost" required>
          </div>
        <div class="mb-1">
            <label for="priceKost" class="form-label">Harga terendah</label>
            <input type="text" name="price_start" class="form-control" id="priceKost" required>
          </div>
        <div class="mb-1">
            <label for="ownerKost" class="form-label">No HP Pemilik</label>
            <input type="text" name="owner" class="form-control" id="ownerKost" required>
        </div>
        <div class="mb-1">
            <label for="imageKost" class="form-label">Foto Kost</label>
            <button id="plusImageKost" type="button" class="btn btn-primary">Tambah Jumlah Foto</button>
            <br>
            <div id="uploadImageKost">
                <input id="imageKost" type="file" name="imageKost[]" multiple>
            </div>
        </div>

    </form>
</div>
@endsection

@section('extra_scripts')
    <script>
        $(document).ready(function() {
        // Fungsi untuk menambahkan input gambar
        
        $("#plusImageKost").click(function() {
            alert('hello')
            var inputGambar = '<input type="file" name="imageKost[]" multiple>';
            $("#uploadImageKost").append(inputGambar);
        });
    });
    const plusImageKost = document.getElementById('plusImageKost');
        plusImageKost.addEventListener("click", function(){
            alert('hello');
        })
    </script>
@endsection