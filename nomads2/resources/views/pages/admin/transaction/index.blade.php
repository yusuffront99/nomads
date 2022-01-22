@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
        
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacinf="0">
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
                    </thead>

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
                                    <a href="{{route('transaction.edit', $item->id)}}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    

<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
    <i class="fa fa-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        Anda yakin menghapus data ini?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{route('transaction.destroy', $item->id)}}" method="POST" class="d-inline" data-toggle="modal" data-target="#exampleModalCenter">
            @csrf
            @method('delete')
            <button class="btn btn-danger">
                <i class="fa fa-trash"></i>
            </button>
        </a>
        </form>
    </div>
    </div>
</div>
</div>






































                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    Data Kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

@endsection