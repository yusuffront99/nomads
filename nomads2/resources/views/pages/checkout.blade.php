@extends('layouts.checkout')

@section('title', 'Checkout')
@section('content')
    <!-- Main -->
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav class="container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item">
                                    Checkout
                                </li>
                                <li class="breadcrumb-item active">
                                    Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h1>Who is going ?</h1>
                            <p>
                                Trip to {{$item->travel_package->title}}, {{$item->travel_package->location}}
                            </p>

                            <div class="attendee">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Picture</td>
                                            <td>Name</td>
                                            <td>Nationality</td>
                                            <td>VISA</td>
                                            <td>Passport</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->details as $detail)
                                            <tr>
                                                <td>
                                                    <img src="https://ui-avatars.com/api/?name={{$detail->username}}" alt="">
                                                </td>
                                                <td class="align-middle">
                                                    {{$detail->username}}
                                                </td>
                                                <td class="align-middle">
                                                    {{$detail->nationality}}
                                                </td>
                                                <td class="align-middle">
                                                    {{$detail->is_visa ? '30Days' : 'N/A'}}
                                                </td>
                                                <td class="align-middle">
                                                    {{\Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive'}}
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{route('checkout-remove', $detail->id)}}">
                                                        <img src="{{url('frontend/images/ic_remove.png')}}" style="width:25px">
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    No Visitor
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="members mt-3">
                                <h3>Add Member</h3>
                                <form action="{{route('checkout-create', $item->id)}}" class="form-inline" method="POST">
                                    @csrf
                                    <label for="username" class="sr-only">username</label>
                                    <input type="text" name="username" id="username" class="form-control mb-2 mr-sm-2" placeholder="username" required>

                                    <label for="nationality" class="sr-only">Nationality</label>
                                    <input type="text" name="nationality" id="nationality" class="form-control mb-2 mr-sm-2" placeholder="Nationality" style="width: 50px" required>

                                    <label for="is_visa" class="sr-only">Visa</label>
                                    <select name="is_visa" id="is_visa" class="custom-select mb-2 mr-sm-2" required>
                                        <option value="" selected>VISA</option>
                                        <option value="1">30 Days</option>
                                        <option value="0">N/A</option>
                                    </select>

                                    <div class="input-group mb-2 mr-sm-2">
                                        <label for="doe_passport" class="sr-only">DOE Passport</label>
                                        <input type="text" name="doe_passport" id="doe_passport" class="form-control datepicker" placeholder="DOE Passport">
                                    </div>

                                    <button type="submit" class="btn btn-add-now mb-2 px-4">Add Now</button>
                                </form>

                                <h3 class="mt-2 mb-0">Note</h3>
                                <p class="disclaimer mb-0">
                                    You are only able to invite member that has registered in Nomads.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Checkout Information</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%">Members</th>
                                    <td width="50%" class="text-right">
                                        {{$item->details->count()}} person
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Additonial VISA</th>
                                    <td width="50%" class="text-right">
                                        ${{$item->additional_visa}},00
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Trip Price</th>
                                    <td width="50%" class="text-right">
                                        ${{$item->travel_package->price}}/Person
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Sub Total</th>
                                    <td width="50%" class="text-right">
                                        ${{$item->transaction_total}},00
                                    </td>
                                </tr>
                                <tr>
                                    <th width="60%">Total (+Unique Code)</th>
                                    <td width="60%" class="text-right">
                                        <span class="text-blue"> ${{$item->transaction_total}},</span><span class="text-orange">{{mt_rand(0,99)}}</span>
                                    </td>
                                </tr>
                            </table><hr>
                            <h2>Payment Instruction</h2>
                            <p class="payment-instructions">
                                Please complete your payment before to 
                                continue the wonderful trip
                            </p>
                            <div class="bank">
                                <div class="bank-item pb-3">
                                    <img src="{{url('frontend/images/ic_bank.png')}}" alt="bank" class="bank-image">
                                    <div class="descriptions">
                                        <h3>PT Nomads ID</h3>
                                        <p>
                                            0809080911
                                            <br>
                                            Bank Central Asia
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="bank-item pb-3">
                                    <img src="{{url('frontend/images/ic_bank.png')}}" alt="bank" class="bank-image">
                                    <div class="descriptions">
                                        <h3>PT Nomads ID</h3>
                                        <p>
                                            0809110911
                                            <br>
                                            Bank ABC
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="join-container">
                            <a href="{{route('checkout-success', $item->id)}}" class="btn btn-block btn-join-now mt-3 py-2">I Have Made Payment</a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{route('details', $item->travel_package->slug)}}" class="text-muted">Cancel Booking</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{url('frontend/libraries/gijgo/css/gijgo.min.css')}}">
@endpush

@push('addon-script')
<script src="{{url('frontend/libraries/gijgo/js/gijgo.min.js')}}"></script>

<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format : 'yyyy-mm-dd',
            icons : {
                rightIcon: '<img src="{{url('frontend/images/ic_doe.png')}}">'
            }
        });
    });
</script>
@endpush