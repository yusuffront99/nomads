@extends('layouts.app')

@section('content')
<h1>Hello Developer</h1>

@foreach ($items as $item)
    <table>
        <tr>
            <td>Title : {{$item->title}}</td>
            {{-- <td><img src="{{asset('storage/' . $item->galleries->first()->image)}}" alt="" style="width: 150px" class="img-thumbnail" /></td> --}}
        
            <td>
                <img src="{{asset('storage/' . $item->galleries->first()->image)}}" alt="">
                <div class="card-travel" style="background-image: url('{{Storage::url($item->galleries->first()->image)}}')"></div>
            </td>
            
        </tr>
    </table>
@endforeach
@endsection