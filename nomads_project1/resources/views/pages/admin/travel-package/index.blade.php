@extends('layouts.main')

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Paket Travel</h1>
        <a href="{{route('travel_package.create')}}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Paket Travel
        </a>
    </div>

    {{-- flash message --}}
    <div class="row">
        <div class="card-body">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif

        @if(session()->has('danger'))
            <div class="alert alert-danger" role="alert">
                {{session('danger')}}
            </div>
        @endif

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Departure Date</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>

                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->location}}</td>
                                <td>{{$item->type}}</td>
                                <td>{{$item->departured_date}}</td>
                                <td>{{$item->type}}</td>
                                <td>
                                    <a href="{{route('travel_package.edit' , $item->id)}}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{route('travel_package.destroy', $item->id)}}" class="d-inline" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <td colspan="7" class="text-center">Data Not Found</td>
                            @endforelse
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>


</div>
@endsection