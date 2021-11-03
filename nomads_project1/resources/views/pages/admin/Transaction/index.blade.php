@extends('layouts.main')

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaction</h1>
        <a href="{{route('transaction.create')}}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Transaction
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
                            <th>Travel</th>
                            <th>User</th>
                            <th>Visa</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->travel_package->title}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->additional_visa}}</td>
                                <td>{{$item->transaction_total}}</td>
                                <td>{{$item->transaction_status}}</td>
                                <td>
                                    <a href="{{route('transaction.show', $item->id)}}" class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
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