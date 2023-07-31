@extends('layouts.base')
@section('title')
    {{$title}}
@endsection
@section('content')
<div style="width:40%; margin:0 auto">
        <a type="button" class="btn btn-secondary" href="{{route('admin.kosts.index')}}">Kembali</a>
        <h1>Edit Kost</h1>
    <form action="{{route('admin.kosts.update',$kost->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
            <div class="mb-1">
                <label for="nameKost" class="form-label">Nama Kost</label>
                <input value="{{$kost->name}}" type="text" name="name" class="form-control" id="nameKost" required>
            </div>
            <div class="mb-1">
                <label for="typeKost" class="form-label">Tipe Kost</label>
                <select id="typeKost" name="type" class="form-select" aria-label="Default select example">
                    <option value="l" {{$kost->type === 'l' ? 'selected': ''}}>Laki-Laki</option>
                    <option value="p" {{$kost->type === 'p' ? 'selected': ''}}>Perempuan</option>
                    <option value="campur" {{$kost->type === 'campur' ? 'selected': ''}}>Campur</option>
                </select>
            </div>
            <div class="mb-1">
                <label for="regionKost" class="form-label">Kabupaten Kost</label>
                <input type="text" value="{{$kost->region}}" name="region" class="form-control" id="regionKost" required>
            </div>
            <div class="mb-1">
                <label for="addressKost" class="form-label">Alamat Kost</label>
                <textarea class="form-control" name="address" id="addressKost" rows="3">{{$kost->address}}</textarea>
            </div>
            <div class="mb-1">
                <label for="gmapsKost" class="form-label">Link Google Maps Kost</label>
                <input type="text" value="{{$kost->location}}" name="location" class="form-control" id="regionKost" required>
            </div>
            <div class="mb-1">
                <label for="priceKost" class="form-label">Harga terendah</label>
                <input type="number" value="{{$kost->price_start}}" min=1  name="price_start" class="form-control" id="priceKost" required>
            </div>
            <div class="mb-1">
                <label for="ownerKost" class="form-label">No HP Pemilik</label>
                <input type="text" value="{{$kost->owner}}" name="owner" class="form-control" id="ownerKost" required>
            </div>


            <div class="mb-4">
                {{-- Looping Foto --}}
                <label for="imageKost" class="form-label">Foto Kost</label>
                <button id="plusImageKost" type="button" class="btn btn-primary">Tambah Jumlah Foto</button>
                <br>
                
                @if ($kost->kostImages != [])
                    <div style="display: flex; flex-direction:row">
                    @foreach ($kost->kostImages as $image)
                    <div style="display: flex; flex-direction:column; margin-bottom:20px">
                        <div>
                                <img style="height: 150px" src="{{asset('storage/images/kost/'.$image->image)}}" alt="{{$image->image}}">
                            </div>
                            <div style="display:flex; flex-direction:row">
                                <p>Ganti </p>
                                <input id="imageKost" type="file" name="images[]" multiple><br>
                            </div>
                            <div style="display:flex; flex-direction:row">
                                <label class="form-check-label" for="flexCheckDefault">
                                  Delete :
                                </label>
                                    <input class="form-check-input" type="checkbox" value="{{$image}}" name="deleteImages[]" id="flexCheckDefault" multiple>
                            </div>
                            
                        </div>
                    @endforeach
                    </div>
                @endif
                <div id="appendImageKost">
                    
                </div>



            </div>
            <div class="mb-1">
                {{-- Lopping Fasilitas Kost --}}
                <label for="facilityKost" class="form-label">Fasilitas Kost</label>
                <button id="plusFacilityKost" type="button" class="btn btn-primary">Tambah Fasilitas Kost</button>
                <br>
                
                @if ($kost->kostFacilities != [])
                    @foreach ($kost->kostFacilities as $facility)
                    <input value="{{$facility->facility}}" id="facilityKost" class="form-control" type="text" name="facilities[]" multiple>
                    @endforeach
                @endif
                    <div id="appendFacilityKost">
                        {{-- new kost facilities --}}
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