@extends('layouts.main')

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Paket Travel &raquo; {{$item->title}}</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @php
                    $no = 1;
                @endphp
                @foreach ($errors->all() as $error)
                    <li>{{$no++}} {{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card-shadow">
        <div class="card-body">
            <form action="{{route('travel_package.update', $item->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="title" value="{{$item->title}}">
                </div>
                <div class="form-group">
                    <label for="slug">slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" placeholder="slug" value="{{$item->slug}}">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" class="form-control" placeholder="location" value="{{$item->location}}">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" id="about"   rows="10" placeholder="about" class="form-control d-block w-100" value="{{$item->about}}"></textarea>
                </div>
                <div class="form-group">
                    <label for="featured_event">Featured Event</label>
                    <input type="text" name="featured_event" id="featured_event" placeholder="Featured Event" class="form-control" value="{{$item->featured_event}}">
                </div>
                <div class="form-group">
                    <label for="language">Language</label>
                    <input type="text" name="language" id="language" placeholder="language" class="form-control" value="{{$item->language}}">
                </div>
                <div class="form-group">
                    <label for="foods">Foods</label>
                    <input type="text" name="foods" id="foods" placeholder="foods" class="form-control" value="{{$item->foods}}">
                </div>
                <div class="form-group">
                    <label for="departured_date">Departured Date</label>
                    <input type="date" name="departured_date" id="departured_date" placeholder="Departured Date" class="form-control" value="{{$item->departured_date}}">
                </div>
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" name="duration" id="duration" placeholder="Duration" class="form-control" value="{{$item->duration}}">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" name="type" id="type" placeholder="Type Trip" class="form-control" value="{{$item->type}}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" placeholder="Price" class="form-control" value="{{$item->price}}">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection