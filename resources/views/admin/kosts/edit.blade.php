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
                <label for="nameKost" class="form-label"><h4>Nama Kost</h4></label>
                <p>Panduan mengisi nama</p>
                <ul>
                    <li>Hanya isi dengan nama lengkap kos, huruf kapital disarankan</li>
                </ul>
                <input value="{{$kost->name}}" type="text" name="name" class="form-control" id="nameKost" required>
            </div>
            <div class="mb-1">
                <label for="typeKost" class="form-label"><h4>Tipe Kost</h4></label>
                <select id="typeKost" name="type" class="form-select" aria-label="Default select example">
                    <option value="l" {{$kost->type === 'l' ? 'selected': ''}}>Laki-Laki</option>
                    <option value="p" {{$kost->type === 'p' ? 'selected': ''}}>Perempuan</option>
                    <option value="campur" {{$kost->type === 'campur' ? 'selected': ''}}>Campur</option>
                </select>
            </div>
            <div class="mb-1">
                <label for="regionKost" class="form-label"><h4>Kabupaten Kost</h4></label>
                <p>Panduan Mengisi kabupatan</p>
                <ul>
                    <li>Misal : Sokaraja, Purbalingga, Purwokerto</li>
                </ul>
                <input type="text" value="{{$kost->region}}" name="region" class="form-control" id="regionKost" required>
            </div>
            <div class="mb-1">
                <label for="addressKost" class="form-label"><h4>Alamat Kost</h4></label>
                <p>Panduan Mengisi alamat</p>
                <ul>
                    <li>Hanya Isi dengan alamat lengkap</li>
                </ul>
                <textarea class="form-control" name="address" id="addressKost" rows="3">{{$kost->address}}</textarea>
            </div>
            <div class="mb-1">
                <label for="gmapsKost" class="form-label"><h4>Link Google Maps Kost -opsional-</h4></label>
                <input type="text" value="{{$kost->location}}" name="location" class="form-control" id="regionKost" >
            </div>
            <div class="mb-1">
                <label for="priceKost" class="form-label"><h4>Harga terendah</h4></label>
                <p>Panduan Mengisi harga terendah</p>
                <ul>
                    <li>Tulis hanya angka</li>
                    <li>Jika tidak tahu isikan dengan 0</li>
                </ul>
                <input type="number" value="{{$kost->price_start}}" min=0  name="price_start" class="form-control" id="priceKost" required>
            </div>
            <div class="mb-1">
                <label for="ownerKost" class="form-label"><h4>No HP Pemilik -Satu nomor-</h4></label>
                <ul>
                    <li>Gunakan 08 jangan +62</li>
                    <li>Jika tidak tahu isikan dengan 0</li>
                </ul>
                <input type="text" value="{{$kost->owner}}" name="owner" class="form-control" id="ownerKost" required>
            </div>


            <div class="mb-4">
                {{-- Looping Foto --}}
                <label for="imageKost" class="form-label"><h4>Foto Kost</h4></label>
                <p>Prosedur Mengubah Foto Kost</p>
                <ol>
                    <li>Hapus Foto yang ingin diubah dengan mencentang 'delete'</li>
                    <li>Klik "Tambah Jumlah Foto" dan upload foto yang baru</li>
                </ol>
                <p>Note : Jika hanya ingin menambah foto, klik "Tambah Jumlah Foto" lalu upload foto</p>
                <button id="plusImageKost" type="button" class="btn btn-primary">Tambah Jumlah Foto</button>
                <br>
                
                @if ($kost->kostImages != [])
                    <div style="display: flex; flex-direction:column; margin-top:20px ">
                    @foreach ($kost->kostImages as $image)
                    <div style="display: flex; flex-direction:column; margin-bottom:20px; margin-right:20px">
                        <div>   <img src="https://images.unsplash.com/photo-1682687221006-b7fd60cf9dd0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" alt="">
                                <img style="height: 150px" src="{{asset('storage/images/kost/'.$image->image)}}" alt="{{$image->image}}">
                            </div>
                            <div style="display:flex; flex-direction:row">
                                <label class="form-check-label" for="flexCheckDefault">
                                  Delete :
                                </label>
                                    <input class="form-check-input" type="checkbox" value="{{$image->id}}" name="deleteImages[]" id="flexCheckDefault" multiple>
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
                <label for="facilityKost" class="form-label"><h4>Fasilitas Kost</h4></label>
                <p>Prosedur Ubah Fasilitas Kost</p>
                <ol>
                    <li>Kalau mau ubah tinggal ubah, kalau mau tambah tinggal 'Tambah Fasilitas Kost'</li>
                </ol>
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
                <button type="submit" class="btn btn-outline-success">Update Kost</button>
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