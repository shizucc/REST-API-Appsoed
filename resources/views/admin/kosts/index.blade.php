@extends('layouts.base')

@section('title')
    {{$title}}
@endsection

@section('extra_styles')
<style>
    
    .bordered-table {
        border-collapse: collapse;
        width: 100%;
    }
    
    .bordered-table td, .bordered-table th {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    </style>
@endsection

@section('content')
    <div style="width: 60%; margin: 0 auto">
        <p>Selamat Datang </p>
        {{-- <img src="{{asset('storage/images/kosts/aademo/kost_01.jpg')}}" alt=""> --}}
        <form action="{{route('logout')}}" method="post">
            @csrf
            @method('post')
            <button type="submit" href="{{route('logout')}}">Logout</button> 
        </form>
        <h1>Semua Kost</h1>
        <a type="button" class="btn btn-primary" href="{{route('admin.kosts.create')}}">Tambah Kost</a>
        <table class="bordered-table" id="kostTable">
            <thead>
                <th>Nama Kost</th>
                <th>Tipe</th>
                <th>Kabupaten Kost</th>
                <th>Alamat Kost</th>
                <th>No HP Pemilik</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($kosts as $kost)
                    <tr>
                        <td>{{$kost->name}}</td>
                        <td>{{ucFirst($kost->type)}}</td>
                        <td>{{$kost->region}}</td>
                        <td>{{$kost->address}}</td>
                        <td>{{$kost->owner}}</td>
                        <td>{{$kost->created_at}}</td>
                        <td>
                            <div style="display: flex; flex-direction:row;">
                                <div style="margin-right: 5px">
                                    <a type="button" class="btn btn-primary" href="{{route('kost.show',$kost->id)}}">Detail</a>
                                </div>
                                <div style="margin-right: 5px">
                                    <a type="button" class="btn btn-warning" href="{{route('admin.kosts.edit',$kost->id)}}">Edit</a>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$kost->id}}">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!-- Button trigger modal -->
                    
                    
                    <!-- Modal -->
                    <div class="modal fade" id="modalDelete{{$kost->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin menghapus :</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <h4 class="modal-title" id="exampleModalLabel">{{$kost->name}}</h4>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <form action="{{route('admin.kosts.destroy',$kost->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    {{-- end of modal --}}
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('extra_scripts')
    <script>
    $(document).ready(function () {
        $('#kostTable').DataTable();
    } );
    </script>
@endsection