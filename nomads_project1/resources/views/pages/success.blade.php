@extends('layouts.success')

@section('container')
    <!-- Main -->
    <main>
        <div class="section-success d-flex align-item-center">
            <div class="col text-center">
                <img src="{{url('frontend/images/ic_mail.png')}}" alt="">
                <h1>Yay! Success</h1>
                <p>
                    We’ve sent you email for trip instruction 
                    <br> 
                    please read it as well
                </p>
                <a href="index.html" class="btn btn-home-page mt-3 px-5">Home Page</a>
            </div>
        </div>
    </main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{url('frontend/libraries/gijgo/css/gijgo.min.css')}}">
@endpush
