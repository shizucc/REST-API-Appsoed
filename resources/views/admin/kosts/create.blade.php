@extends('layouts.base')
@section('title')
    {{$title}}
@endsection
@section('content')
<div style="width:40%; margin:0 auto">
        <a type="button" class="btn btn-secondary" href="{{route('admin.kosts.index')}}">Kembali</a>
        <h1>Form Kost</h1>
    <form action="{{route('admin.kosts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
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
                <input type="number" min=0  name="price_start" class="form-control" id="priceKost" required>
            </div>
            <div class="mb-1">
                <label for="ownerKost" class="form-label">No HP Pemilik -Satu nomor-</label>
                <input type="text" name="owner" class="form-control" id="ownerKost">
            </div>
            <div class="mb-4">
                <label for="imageKost" class="form-label">Foto Kost</label>
                <button id="plusImageKost" type="button" class="btn btn-primary">Tambah Jumlah Foto</button>
                <br>
                <div id="appendImageKost">
                    <input id="imageKost" type="file" name="images[]" multiple><br>
                </div>
            </div>
            <div class="mb-1">
                <label for="facilityKost" class="form-label">Fasilitas Kost</label>
                <button id="plusFacilityKost" type="button" class="btn btn-primary">Tambah Fasilitas Kost</button>
                <br>
                <div id="appendFacilityKost">
                    <input id="facilityKost" class="form-control" type="text" name="facilities[]" multiple>
                </div>
            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-outline-success">Tambah Kost</button>
            </div>

    </form>
</div>
@endsection

@section('extra_scripts')
    <script>
        const buttonAddImageKost = document.getElementById("plusImageKost");
        buttonAddImageKost.addEventListener("click", function(){
            var inputGambar = "<input type='file' name='images[]' multiple><br>";
            $("#appendImageKost").append(inputGambar);
        })

        const buttonAddFacilityKost = document.getElementById("plusFacilityKost");
        buttonAddFacilityKost.addEventListener("click", function(){
            var inputFacility = '<input id="facilityKost" class="form-control" type="text" name="facilities[]" multiple>';
            $("#appendFacilityKost").append(inputFacility);
        })
    </script>
@endsection