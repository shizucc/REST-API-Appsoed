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
        <h1>Semua Fakultas</h1>
        <a type="button" class="btn btn-primary" href="{{route('admin.faculty.create')}}">Tambah Fakultas</a>
        <table class="bordered-table" id="kostTable">
            <thead>
                <th>Nama Fakultas</th>
                <th>Alias</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($faculties as $faculty)
                    <tr>
                        <td>{{$faculty->name}}</td>
                        <td>{{ucFirst($faculty->alias)}}</td>
                        <td>{{$faculty->description}}</td>
                        <td><img src="{{asset('storage/images/faculty/'.$faculty->image) }}" alt="" height="100px"></td>
                        <td>
                            <div style="display: flex; flex-direction:row;">
                                <div style="margin-right: 5px">
                                    <a type="button" class="btn btn-primary" href="{{route('faculty.show',$faculty->id)}}">Detail</a>
                                </div>
                                <div style="margin-right: 5px">
                                    <a type="button" class="btn btn-warning" href="{{route('admin.faculty.edit',$faculty->id)}}">Edit</a>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$faculty->id}}">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!-- Button trigger modal -->
                    
                    
                    <!-- Modal -->
                    <div class="modal fade" id="modalDelete{{$faculty->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin menghapus :</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <h4 class="modal-title" id="exampleModalLabel">{{$faculty->name}}</h4>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <form action="{{route('admin.faculty.destroy',$faculty->id)}}" method="post">
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