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
        <h1>Semua Komik</h1>
        <a type="button" class="btn btn-primary" href="{{route('admin.comic.create')}}">Tambah Komik</a>
        <table class="bordered-table" id="kostTable">
            <thead>
                <th>Judul</th>
                <th>Cover</th>
                <th>File</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($comics as $comic)
                    <tr>
                        <td>{{$comic->title}}</td>
                        <td><img src="{{asset('storage/images/comic/cover/'.$comic->cover) }}" alt="" height="100px"></td>
                        <td>Ini file</td>
                        <td>
                            <div style="display: flex; flex-direction:row;">
                                <div style="margin-right: 5px">
                                    <a type="button" class="btn btn-primary" href="{{route('comic.show',$comic->id)}}">Detail</a>
                                </div>
                                <div style="margin-right: 5px">
                                    <a type="button" class="btn btn-warning" href="{{route('admin.comic.edit',$comic->id)}}">Edit</a>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$comic->id}}">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!-- Button trigger modal -->
                    
                    
                    <!-- Modal -->
                    <div class="modal fade" id="modalDelete{{$comic->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin menghapus :</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <h4 class="modal-title" id="exampleModalLabel">{{$comic->title}}</h4>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <form action="{{route('admin.comic.destroy',$comic->id)}}" method="post">
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