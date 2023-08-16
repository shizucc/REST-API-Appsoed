@extends('layouts.base')
@section('title')
    {{$title}}
@endsection
@section('content')
<div style="width:40%; margin:0 auto; margin-top:80px">
        
        <h1>Form Kost</h1>
    <form action="{{route('admin.kost.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
            <div class="mb-1">
                <label for="nameKost" class="form-label"><h4>Nama Kost</h4></label>
                <p>Panduan mengisi nama</p>
                <ul>
                    <li>Hanya isi dengan nama lengkap kos, huruf kapital disarankan</li>
                </ul>
                <input type="text" name="name" class="form-control" id="nameKost" required>
            </div>
            <div class="mb-1">
                <label for="typeKost" class="form-label"><h4>Tipe Kost</h4></label>
                <select id="typeKost" name="type" class="form-select" aria-label="Default select example">
                    <option value="l" selected>Laki-Laki</option>
                    <option value="p">Perempuan</option>
                    <option value="campur">Campur</option>
                </select>
            </div>
            <div class="mb-1">
                <label for="regionKost" class="form-label"><h4>Kabupaten Kost</h4></label>
                <p>Panduan Mengisi kabupatan</p>
                <ul>
                    <li>Misal : Sokaraja, Purbalingga, Purwokerto</li>
                </ul>
                <input type="text" name="region" class="form-control" id="regionKost" required>
            </div>
            <div class="mb-1">
                <label for="addressKost" class="form-label"><h4>Alamat Kost</h4></label>
                <p>Panduan Mengisi alamat</p>
                <ul>
                    <li>Hanya Isi dengan alamat lengkap</li>
                </ul>
                <textarea class="form-control" name="address" id="addressKost" rows="3"></textarea>
            </div>
            <div class="mb-1">
                <label for="gmapsKost" class="form-label"><h4>Link Google Maps Kost -opsional-</h4></label>
                <input type="text" name="location" class="form-control" id="regionKost">
            </div>
            <div class="mb-1">
                <label for="priceKost" class="form-label"><h4>Harga terendah</h4></label>
                <p>Panduan Mengisi harga terendah</p>
                <ul>
                    <li>Tulis hanya angka</li>
                    <li>Jika tidak tahu isikan dengan 0</li>
                </ul>
                <input type="number" min=0  name="price_start" class="form-control" id="priceKost" required>
            </div>
            <div class="mb-1">
                <label for="ownerKost" class="form-label"><h4>No HP Pemilik -Satu nomor-</h4></label>
                <ul>
                    <li>Gunakan 08 jangan +62</li>
                    <li>Jika tidak tahu isikan dengan 0</li>
                </ul>
                <input type="text" name="owner" class="form-control" id="ownerKost" required>
            </div>
            <div class="mb-4">
                <label for="imageKost" class="form-label"><h4>Foto Kost</h4></label>
                <button id="plusImageKost" type="button" class="btn btn-primary">Tambah Jumlah Foto</button>
                <br>
                <div id="appendImageKost">
                    <input id="imageKost" type="file" name="images[]" multiple><br>
                </div>
            </div>
            <div class="mb-1">
                <label for="facilityKost" class="form-label"><h4>Fasilitas Kost</h4></label>
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