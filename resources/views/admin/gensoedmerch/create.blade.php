@extends('layouts.base')
@section('title')
    {{$title}}
@endsection
@section('content')
<div style="width:40%; margin:0 auto">
        <a type="button" class="btn btn-secondary" href="{{route('admin.gensoedmerch.index')}}">Kembali</a>
        <h1>Form Gensoed Merch</h1>
    <form action="{{route('admin.gensoedmerch.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
            <div class="mb-3">
                <label for="nameMerch" class="form-label"><h4>Nama Produk</h4></label>
                <p>Panduan mengisi nama</p>
                <ul>
                    <li>Pakai Nama produk yang jelas!</li>
                </ul>
                <input type="text" name="name" class="form-control" id="nameMerch" required>
            </div>

            <div class="mb-3">
                <label for="startPriceMerch" class="form-label"><h4>Harga terendah</h4></label>
                <p>Panduan Mengisi harga terendah</p>
                <ul>
                    <li>Tulis hanya angka</li>
                    <li>Jika hanya mengisi Harga terendah maka akan menjadi harga utama tanpa rentang harga</li>
                </ul>
                <input type="number" min=0  name="price_start" class="form-control" id="startPriceMerch" required>
            </div>

            <div class="mb-3">
                <label for="endPriceMerch" class="form-label"><h4>Harga tertinggi</h4></label>
                <p>Panduan Mengisi harga tertinggi</p>
                <ul>
                    <li>Tulis hanya angka</li>
                    <li>Jika menulis harga tertinggi dan terendah -keduanya- maka akan menjadi rentang harga</li>
                    <li>Jika tidak tahu kosongi</li>
                </ul>
                <input type="number" min=0  name="price_end" class="form-control" id="endPriceMerch">
            </div>

            <div class="mb-3">
                <label for="productLinkMerch" class="form-label"><h4>Link -shopee/tokped/lain- Produk</h4></label>
                <input type="text" name="product_link" class="form-control" id="productLinkMerch" required>
            </div>

            <div class="mb-4">
                <label for="imageMerch" class="form-label"><h4>Foto Produk</h4></label><br>
                    <input id="imageMerch" type="file" name="image" required><br>

            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-outline-success">Tambah Produk</button>
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