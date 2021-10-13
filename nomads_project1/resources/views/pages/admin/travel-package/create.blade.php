@extends('layouts.main')

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Paket Travel</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($erros as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card-shadow">
        <div class="card-body">
            <form action="{{route('travel-package.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="title" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" class="form-control" placeholder="location" value="{{old('location')}}">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" id="about"  rows="10" value={{old('about')}} placeholder="about" class="form-control d-block w-100"></textarea>
                </div>
                <div class="form-group">
                    <label for="featured_event">Featured Event</label>
                    <input type="text" name="featured_event" id="featured_event" placeholder="Featured Event" class="form-control" value="{{old('featured_event')}}">
                </div>
                <div class="form-group">
                    <label for="languange">Languange</label>
                    <input type="text" name="languange" id="languange" placeholder="language" class="form-control" value="{{old('languange')}}">
                </div>
                <div class="form-group">
                    <label for="foods">Foods</label>
                    <input type="text" name="foods" id="foods" placeholder="foods" class="form-control" value="{{old('foods')}}">
                </div>
                <div class="form-group">
                    <label for="departured_date">Departured Date</label>
                    <input type="date" name="departured_date" id="departured_date" placeholder="Departured Date" class="form-control" value="{{old('departured_date')}}">
                </div>
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="date" name="duration" id="duration" placeholder="Duration" class="form-control" value="{{old('duration')}}">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" name="type" id="type"placeholder="Type" class="form-control" value="{{old('type')}}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" placeholder="Price" class="form-control" value="{{old('price')}}">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection